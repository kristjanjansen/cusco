## Setup

No extra setup, just clone the project and

```sh
php artisan serve
```

## About

The goal of this experiment is to clear up current view rendering mess and come up
with a solution with clearer data and control flow. Currently the view logic
is diffused into models, controllers, views and utility functions.

The proposal is to introduce some MVVC and declarative programming ideas to view rendering.

Here are some core concepts:

#### 1. Models

Models work as previously but the presentational methods (truncated body texts etc) are moved out (see below).

Open questions:
* How to serve fallback content (no related posts, no content in particular destination tree level etc)? Consider ```ModelFinder``` class, see [this](https://laracasts.com/series/whatcha-working-on/episodes/3).


#### 2. Presenters

Presenters, essentialy ViewModels that augment the models with presenter methods, such as

```
Content::find(1)->present()->bodyShort
```

Instead of canonical ```->present()``` we consider simpler naming convention, such as

```
Content::find(1)->vars()->bodyShort
```

See [this screencast](https://laracasts.com/series/whip-monstrous-code-into-shape/episodes/11) for a reference.

Presenters can be stored next to models, such as ```ContentPresenter.php``` and can be delivered as traits.

Under discussion:

* Will views only receive model data via presenters / vars or can they access model attributes directly?


#### 3. Controllers

Controllers work as previously. Its recommended to have a minimal amount of view-related code in ```index``` and ```show``` methods (see the example below)


#### 4. Components

Components are wrappers around partial views that can be rendered via ```component()``` helper. Both Blade and VueJS components are supported,  ```component()``` helper abstracts away the difference calling them.

Blade components can be generated using

```sh
php artisan make:component ComponentName
```

Vue components can be generated using

```sh
php artisan make:component ComponentName --vue
```

Components are stored in ```resources/views/components``` directory and they have simple flat structure:

```yaml
- resources/views/components/Alert/Alert.vue
- resources/views/components/Alert/Alert.css
- resources/views/components/Alert/Alert.yaml # Optional, for styleguide
- resources/views/components/ProfileImage/ProfileImage.blade.php
- resources/views/components/ProfileImage/ProfileImage.css
- resources/views/components/ProfileImage/ProfileImage.yaml # Optional, for styleguide
- ...
```

Component API is modeled after Laravel views, collections and other chained APIs and works as follows:

```php

component('MyComponent')
    ->is('small') // This used to be $modifiers variable
    ->is(collect(['orange', 'yellow'])->random()) // Can be chained and dynamic
    ->with('data1', 'Hello') // Same as view()->with()
    ->with('data2', 'World') // Can be chained
    ->when($request->user()->can('see-content')) // Optional access control check
```

The uses the Blade template...

```handlebars

<!-- resources/views/components/MyComponent/MyComponent.blade.php -->

<div class="MyComponent {{ $is }}">
    <div class="MyComponent__data1"> {{ $data1 }} </div>
    <div class="MyComponent__data2"> {{ $data2 }} </div>
</div>
```

...and will be rendered into this HTML:

```html
<div class="MyComponent MyComponent--small MyComponent--orange">
    <div class="MyComponent__data1">Hello</div>
    <div class="MyComponent__data2">World</div>
</div>
```

Here is and example with model, presenters, controller and nested components:

```php

// app/Http/Controllers/ContentStaticController.php
// ...

$post = Content::whereType('static')->findOrFail($id);
$photo = Content::getRandomFeaturedPhoto();

return view('pages.content.static.show')
    ->with('header', component('Header')
        ->with('menu', config('menu.header'))
        ->with('title', $post->vars()->title)
        ->with('photo', $photo->vars())
    )
    ->with('content', [
        component('ListItem') // Something like row component used to be
            ->with('user', component('UserImage')->with('user', $post->user->vars())
            ->with('title', $post->vars()->title)
            ->with('subtitle', $post->vars()->meta)),
        component('Body')->with('body', $post->vars()->body)
    ])
    ->with('footer_ad', component('Ad')->is('inFooter'))
    ->with('footer', component('Footer')->with('menu', config('menu.footer')))
    
```

It feels a bit too much code for a controller. Lets try to move more complex and/or repeating parts away. 

Meet...

#### 5. Component groups

Component groups are similar to Laravel's [view composers](https://laravel.com/docs/5.2/views#view-composers), the are essentially ViewControllers that encapsulate certain complex or recurring component rendering.

The have many names, they can also be **Regions**, **Patterns**, **Modules** etc.

Component groups are stored in ```app/ComponentGroups``` and can be generated using

```sh
php artisan make:componentgroup GroupName
```

Here is the same code again with ComponentGroups:

```php

// app/Http/Controllers/ContentStaticController.php

$post = \App\Content::whereType('static')->findOrFail($id);

return view('pages.content.static.show')
    ->with('header', componentGroup('Header'))
    ->with('content', componentGroup('ContentStaticShow', $post)),
    ->with('footer_ad', component('Ad')->is('inFooter'))
    ->with('footer', componentGroup('Footer'))
    
```

ComponentGroups are invoked using ```componentGroup()`` helper function.

Regions are the most immature part of the proposal:

* Naming. For experimentation there are ```region()```, ```pattern()``` and ```module()``` aliases.
* Various loading options: Controller-only, Laravel view composers, raw calls from Blade etc
* Should we pass ```$request```?
* Are we simply calling controllers from controllers or is it ok in MVVC context?
* Should we surface the hide/show logic to controller level?

Here is another more complex example:

```php

// app/Http/Controllers/ContentStaticController.php
// ...

$travelmatePosts = Content::whereType('travelmate')::getLatestPagedPosts(24);
$forumPosts =  Content::whereType('forum')::getLatestPosts(5);

return view('pages.content.travemates.index')
    ->with('header', Regions\Header::get())
    ->with('content', [
        Regions\ContentTravelmates::get($travelmatePosts->forPage(1, 12)),
        Regions\AdMedium::get(),
        Regions\ContentTravelmates::get($travelmatePosts->forPage(2, 12)),
    ])
    ->with('sidebar', [
        Regions\TravelmatesAbout::get(),
        Regions\AdSmall::get(),
        Regions\ContentForumSidebar::get($forumPosts),
    ])
    ->with('footer_ad', Regions\AdLarge::get())
    ->with('footer', Regions\Footer::get());

```

And here is the ContentGroup:

```php

// app/ContentGroups/ContentTravelmates.php

use Request;

class ContentTravelmates
{

    public static function render(Request $request, $forumPosts)
    {

        return component('Box')
            ->is('light')
            ->with('title', trans('forum.box.title'))
            ->with('content', $forumPosts->render(function($post) {
                return component('ListItem')
                    ->with('figure', component('UserImage')->is('small')->with('user', $post->user))
                    ->with('title', $post->present()->titleSmall)
                    ->with('route', $post->present()->route)
                    ->with('subtitle', $post->present()->meta)
                    ->with('subtitle2', $post->topics->render(function($topic) {
                        return component('Tag')
                            ->is('small')
                            ->is(collect(['yellow', 'red', 'orange'])->random())
                            ->with('title', $destination->present()->smallTitle)
                            ->with('route', $destination->present()->route);
                        })
                    );
            }))
            ->when($request->user()->can('see-forum-posts'));

    }

}
```

Note the ```render()``` method, it is a custom helper method of Collection to render components more easily:

Instead writing...

```php
$my_eloquent_results->map(function($result) {
    return collection('MyComponent')->with('result', $result)->render();
})->implode('')
```
...you can write

```php
$my_eloquent_results->render(function($result) {
    return collection('MyComponent')->with('result', $result);
});
```


#### 6. Views

Views are still views but they are degraded to simple layouts that accomodate rendered components and lay them out using helper classes.

```html

    <!-- pages/content/static/show.blade.php -->

    @extends('layouts.main')

    @section('header', $header)

    @section('content')

    <div class="row">

        <div class="col-8 padding-right-collapse-sm">
        
            @foreach($content as $content_item)
        
                <div class="margin-bottom-md">   
                
                    {!! content_item !!}
            
                </div>

            @endforeach

        </div>

        <div class="col-4 padding-left-collapse-sm">
        
            @foreach($sidebar as $sidebar_item)
        
                <div class="margin-bottom-md">   
                    
                    {!! sidebar_item !!}
                
                </div>

            @endforeach
        
        </div>

    </div>

    @endsection

    @section('footer', $footer)

```

## Changelog

* 0.1
    * Initial version
* 0.2
    * Changed 'Composers' to 'Regions'
    * Proposing region() helper
* 0.3
    * Changed 'Regions' to 'ComponentGroups'
    * Implementing ```component()``` and ```componentGroup()``` / ```region()``` / ```pattern()``` helpers
* 0.4
    * Implementing styleguide and sample layout
  

## Why Cusco?

Because https://fromalaskatobrazil.files.wordpress.com/2012/09/12-sided-inca-stone.jpg