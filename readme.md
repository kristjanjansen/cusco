## Changelog

#### 0.1

* Initial version

#### 0.2

* Changed 'Composers' to 'Regions'
* Proposing region() helper

#### 0.3

* Proposing componentGroup() helper

## About

The goal of this experiment is to clear up current view rendering mess and come up
with a solution with clearer data and control flow. Currently the view logic
is diffused into models, controllers, views and utility functions.

The proposal is to introduce some MVVC and functional programming ideas to view rendering.
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

See [this](https://laracasts.com/series/whip-monstrous-code-into-shape/episodes/11) for a reference.

Presenters can be stored next to models, such as ```ContentPresenter.php``` and can be delivered as traits.

Note: we should consider simpler naming convention, such as

```
Content::find(1)->vars()->bodyShort
```

Under discussion:

* Will views only receive model data via presenters / vars or can they access model attributes directly?

#### 3. Controllers

Controllers work as previously. Its recommended to have a minimal amount of view-related code in ```index``` and ```show``` methods (see the example below)

#### 4. Components

Components are wrappers around partial views that can be rendered via ```component()``` helper or ```@component``` Blade directive. 

Both Blade and VueJS components are supported,  ```component()``` helper abstracts away the difference calling them. 

Components are stored in ```resources/views/components``` directory and they have simple flat structure:

```yaml
- resources/views/components/Alert/Alert.vue
- resources/views/components/Alert/Alert.css
- resources/views/components/UserImage/UserImage.blade.php
- resources/views/components/UserImage/UserImage.css
- resources/views/components/UserImage/UserImage.yaml # Optional, for styleguide
- ...
```

Component API is modeled after Laravel views, collections and other chained APIs and works as follows:

```php
component('Name')
    ->is('small') // This used to be $modifiers variable
    ->is(collect(['orange', 'yellow'])->random()) // Can be chained and dynamic
    ->with('data1', $data1) // Same as view()->with()
    ->with('data2', $data2) // Can be chained
    ->when($request->user()->can('see-content')) // Optional access control check
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

It feels almost too much code for a controller. Lets try to move more complex and/or repeating parts away. Meet...

#### 5. Regions

Regions are similar to Laravel's [view composers](https://laravel.com/docs/5.2/views#view-composers), the are essentially ViewControllers that encapsulate certain complex or recurring component rendering.

Regions are stored in ```app/Regions```

Here is the same code again with Regions:

```php

// app/Http/Controllers/ContentStaticController.php
// ...

$post = \App\Content::whereType('static')->findOrFail($id);

return view('pages.content.static.show')
    ->with('header', Regions\Header::get())
    ->with('content', Regions\ContentStaticShow::get($post)),
    ->with('footer_ad', component('Ad')->is('inFooter'))
    ->with('footer', Regions\Footer::get())
    
```

Here's the same example with a ```region()``` helper method:

```php

// app/Http/Controllers/ContentStaticController.php

$post = \App\Content::whereType('static')->findOrFail($id);

return view('pages.content.static.show')
    ->with('header', region('Header'))
    ->with('content', region('ContentStaticShow', $post)),
    ->with('footer_ad', component('Ad')->is('inFooter'))
    ->with('footer', region('Footer'))
    
```

...or with ```componentGroup()``` helper

```php

// app/Http/Controllers/ContentStaticController.php

$post = \App\Content::whereType('static')->findOrFail($id);

return view('pages.content.static.show')
    ->with('header', componentGroup('Header'))
    ->with('content', componentGroup('ContentStaticShow', $post)),
    ->with('footer_ad', component('Ad')->is('inFooter'))
    ->with('footer', componentGroup('Footer'))
    
```


Regions are the most immature part of the proposal:

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

And here is the Region:

```php

// app/Regions/ContentTravelmates.php

use Request;

class ContentTravelmates
{

    public static function get(Request $request, $forumPosts)
    {

        return component('Box')
            ->is('light')
            ->with('title', trans('forum.box.title'))
            ->with('content', $forumPosts->transform(function($post) {
                return component('ListItem')
                    ->with('figure', component('UserImage')->is('small')->with('user', $post->user))
                    ->with('title', $post->present()->titleSmall)
                    ->with('route', $post->present()->route)
                    ->with('subtitle', $post->present()->meta)
                    ->with('subtitle2', $post->topics->transform(function($topic) {
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
#### 6. Views

Views are still views but they are degraded to simple layouts that accomodate rendered components and lay them out using helper classes.

```html

    <!-- pages/content/static/show.blade.php -->

    @extends('layouts.main')

    @section('header', $header)

    @section('content')

    <div class="row">

        <div class="col-8 padding-right-sm">
        
            @foreach($content as $content_item)
        
                <div class="margin-bottom-md">   
                
                    {!! content_item !!}
            
                </div>

            @endforeach

        </div>

        <div class="col-4 padding-left-mobile-sm">
        
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

## Why Cusco?

Because https://fromalaskatobrazil.files.wordpress.com/2012/09/12-sided-inca-stone.jpg