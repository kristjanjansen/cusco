<?php

namespace App\Http\Controllers;

use App;
use Request;
use Storage;

class StyleguideController extends Controller {

    public function index() {

        return view('layouts.1col')->with('content', collect()

            // Alert

            ->push(component('Alert')->with('alert', ''))

            ->push(component('Alert')->is('error')->with('alert', ''))

            ->push(component('AlertDemo'))

            // Arc

            ->push(component('ArcDemo'))

            // Badge

            ->push(component('badge')->with('title', 'Badge'))

            ->push(component('badge')->with('title', 1))

            ->push(component('badge')->with('title', 10))

            ->push(component('badge')->with('title', 100))
             
            // Block

             ->push(component('Block')
                ->with('title', 'Block')
                ->with('content', collect(['First item', 'Second item']))
            )

            ->push(component('Block')
                ->is('withBackground')
                ->with('title', 'Block with background')
                ->with('content', collect(['First item', 'Second item']))
            )

            // Body

            ->push(component('Body')->with('body', '<h3>Body</h3><p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

            ->push(component('Body')->is('responsive')->with('body', '<h3>Responsive body</h3><p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

            // Button

            ->push(component('Button')->with('title', 'I am button'))

            ->push(component('Button')->is('wide')->with('title', 'I am wide button'))

            // Comment

            ->push(component('Comment')
                ->with('user', component('ProfileImage')
                    ->with('image', '/samples/norris.jpg')
                )
                ->with('meta', 'meta')
                ->with('body', 'body')
                ->with('tags', 'tags')
                ->with('flags', 'flags')
            )

            // Editor

            ->push(component('Editor'))

            // Footer

            ->push(component('Footer')
                ->with('image', '/samples/footer.jpg')
                ->with('logo', '')
                ->with('links', [
                    'col1' => ['First link', 'Second link'],
                    'col2' => ['First link', 'Second link'],
                    'col3' => ['First link', 'Second link'],
                    'social' => ['First link', 'Second link'],
                ])
                ->with('licence', 'Licence')
            )

            // Form

            ->push(component('FormHeader')
                ->with('action', '/styleguide/formdemo')
                ->with('method', 'post'))
      
            ->push(component('FormTextfield')
                ->with('name', 'title')
                ->with('label', 'Title')
                ->with('value', 'Hello'))
      
            ->push(component('FormTextarea')
                ->with('name', 'body')
                ->with('label', 'Body')
                ->with('value', 'World')
            )
            ->push(component('FormSelect')->with('name', 'selector'))

            ->push(component('FormButton')->with('title', 'Save'))
            
            ->push(component('FormFooter'))

            // ForumPost

            ->push(component('ForumPost')
                ->with('user', component('ProfileImage')
                    ->with('image', '/samples/norris.jpg')
                )
                ->with('title', 'title')
                ->with('meta', 'meta')
                ->with('body', 'body')
                ->with('tags', 'tags')
                ->with('flags', 'flags')
            )

            // ImageUpload

            ->push(component('ImageUpload'))

            // ListItem

            ->push(component('ListItem')
                ->with('figure', component('ProfileImage')
                    ->with('image', '/samples/norris.jpg')
                )
                ->with('title', 'Title')
                ->with('route', '')
                ->with('subtitle', 'Subtitle')
            )

            // Link

            ->push(component('Link')
                ->with('icon', 'icon-arrow-right')
                ->with('title', 'Go ahead and click')
                ->with('route', '')
            )

            // Map

            ->push(component('Map'))

            // Masthead

            ->push(component('Masthead')
                ->with('image', '/samples/header.jpg')
                ->with('search', component('Icon')
                    ->with('name', 'icon-search')
                )
                ->with('logo', component('Icon')
                    ->with('name', 'tripee_logo')
                    ->with('width', '220')
                    ->with('height', '100')
                )
                ->with('smalllogo', component('Icon')
                    ->with('name', 'tripee_logo_plain')
                    ->with('width', '80')
                    ->with('height', '20')
                    ->with('color', 'white')
                )
                ->with('navbar', component('Navbar')
                    ->with('links', ['First', 'Second'])
                    ->with('sublinks', ['First', 'Second'])
                )
                ->with('navbar_mobile', component('NavbarMobile')
                    ->with('links', ['First', 'Second'])
                    ->with('sublinks', ['First', 'Second'])
                )
                ->with('title', 'Title')
            )

            // Navbar

            ->push(component('Navbar')
                ->with('links', ['First link', 'Second link'])
                ->with('sublinks', ['Third link'])
            )

            // NavbarMobile

            ->push(component('NavbarMobile')
                ->with('links', ['First link', 'Second link'])
                ->with('sublinks', ['Third link'])
            )
            
            // ProfileImage

            ->push(component('ProfileImage')->with('image', '/samples/norris.jpg'))

            // Promo

            ->push(component('Promo')->with('route', '/promo'))

            // Tag

            ->push(component('Tag')->with('title', 'I am tag'))

            // Icons

            ->merge($this->getIcons())

        );

    }

    public function getIcons() {

        return collect(Storage::disk('root')->files('resources/svg'))
            ->map(function($filepath) {
                return pathinfo($filepath, PATHINFO_FILENAME);
            })
            ->map(function($filename) {
                return '<p>'. $filename . '</p>' . component('Icon')
                        ->with('name', $filename)
                        ->with('color', 'gray')
                        ->with('width', 32)
                        ->with('height', 32);
            });
    
    }

    public function formDemo() {

        dump(request()->all());
        sleep(2);

        return redirect('styleguide')->with('alert', 'We are back from PHP');

    }

}
