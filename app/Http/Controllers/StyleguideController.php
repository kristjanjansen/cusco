<?php

namespace App\Http\Controllers;

use App;
use Request;
use Storage;

class StyleguideController extends Controller {

    public function index() {

        return view('layouts.1col')
            ->with('header', '')
            ->with('content', collect()

                ->push(component('StyleguideHeader')->with('title', 'Alert'))
                ->push(component('Alert')
                    ->with('alert', ''))

                ->push(component('StyleguideHeader')->with('title', 'Alert--error'))
                ->push(component('Alert')
                    ->is('error')
                    ->with('alert', ''))

                ->push(component('StyleguideHeader')->with('title', 'AlertDemo'))
                ->push(component('AlertDemo'))

                ->push(component('StyleguideHeader')->with('title', 'Arc'))
                ->push(component('ArcDemo'))

                ->push(component('StyleguideHeader')->with('title', 'Block'))
                ->push(component('Block')
                    ->with('title', 'Title')
                    ->with('header', '')
                    ->with('footer', '')
                    ->with('content', collect(['First item', 'Second item']))
                )

                ->push(component('StyleguideHeader')->with('title', 'Block--withBackground'))
                ->push(component('Block')
                    ->is('withBackground')
                    ->with('header', '')
                    ->with('footer', '')
                    ->with('title', 'Title')
                    ->with('content', collect(['First item', 'Second item']))
                )

                ->push(component('StyleguideHeader')->with('title', 'Body'))
                ->push(component('Body')->with('body', '<p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

                ->push(component('StyleguideHeader')->with('title', 'Body--responsive'))
                ->push(component('Body')->is('responsive')->with('body', '<p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

                ->push(component('StyleguideHeader')->with('title', 'Button'))
                ->push(component('Button')->with('title', 'I am button'))

                ->push(component('StyleguideHeader')->with('title', 'Button--wide'))
                ->push(component('Button')->is('wide')->with('title', 'I am wide button'))

                ->push(component('StyleguideHeader')->with('title', 'Comment'))
                ->push(component('Comment')
                    ->with('user', component('ProfileImage')
                        ->with('image', '/samples/norris.jpg')
                    )
                    ->with('meta', 'meta')
                    ->with('body', 'body')
                    ->with('tags', 'tags')
                    ->with('flags', 'flags')
                )

                ->push(component('StyleguideHeader')->with('title', 'Editor'))
                ->push(component('Editor'))

                ->push(component('StyleguideHeader')->with('title', 'Footer'))
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

                ->push(component('FormHeader')
                    ->with('action', '/styleguide/formdemo')
                    ->with('method', 'post'))
          
                ->push(component('StyleguideHeader')->with('title', 'FormTextfield'))
                ->push(component('FormTextfield')
                    ->with('name', 'title')
                    ->with('label', 'Title')
                    ->with('value', 'Hello'))
          
                ->push(component('StyleguideHeader')->with('title', 'FormTextarea'))
                ->push(component('FormTextarea')
                    ->with('name', 'body')
                    ->with('label', 'Body')
                    ->with('value', 'World')
                )
                ->push(component('StyleguideHeader')->with('title', 'FormSelect'))
                ->push(component('FormSelect')->with('name', 'selector'))

                ->push(component('StyleguideHeader')->with('title', 'FormButton'))
                ->push(component('FormButton')->with('title', 'Save'))
                
                ->push(component('FormFooter'))


                ->push(component('StyleguideHeader')->with('title', 'ForumPost'))
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

                ->push(component('StyleguideHeader')->with('title', 'ImageUpload'))
                ->push(component('ImageUpload'))


                ->push(component('StyleguideHeader')->with('title', 'ListItem'))
                ->push(component('ListItem')
                    ->with('figure', component('ProfileImage')
                        ->with('image', '/samples/norris.jpg')
                    )
                    ->with('title', 'Title')
                    ->with('route', '')
                    ->with('subtitle', 'Subtitle')
                )

                ->push(component('StyleguideHeader')->with('title', 'Link'))
                ->push(component('Link')
                    ->with('icon', 'icon-arrow-right') // default
                    ->with('title', 'Go ahead and click')
                    ->with('route', '#')
                )

                ->push(component('StyleguideHeader')->with('title', 'Badges'))
                ->push(component('badge')->with('title', 1))
                ->push(component('badge')->with('title', 10))
                ->push(component('badge')->with('title', 100))
                    


                ->push(component('StyleguideHeader')->with('title', 'Map'))
                ->push(component('Map'))


                ->push(component('StyleguideHeader')->with('title', 'Masthead'))
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


                ->push(component('StyleguideHeader')->with('title', 'Navbar'))
                ->push(component('Navbar')
                    ->with('links', ['First link', 'Second link'])
                    ->with('sublinks', ['Third link'])
                )


                ->push(component('StyleguideHeader')->with('title', 'NavbarMobile'))
                ->push(component('NavbarMobile')
                    ->with('links', ['First link', 'Second link'])
                    ->with('sublinks', ['Third link'])
                )
                

                ->push(component('StyleguideHeader')->with('title', 'ProfileImage'))
                ->push(component('ProfileImage')->with('image', '/samples/norris.jpg'))


                ->push(component('StyleguideHeader')->with('title', 'Promo'))
                ->push(component('Promo')->with('route', '/promo'))


                ->push(component('StyleguideHeader')->with('title', 'Tag'))
                ->push(component('Tag')->with('title', 'I am tag'))


                ->merge($this->getIcons())


        )
        ->with('footer', '');

    }

    public function getIcons() {

        return collect(Storage::disk('root')->files('resources/svg'))
            ->map(function($filepath) {
                return pathinfo($filepath, PATHINFO_FILENAME);
            })
            ->map(function($filename) {
                return component('StyleguideHeader')->with('title', 'Icon '. $filename)
                    . component('Icon')
                        ->with('name', $filename)
                        ->with('color', 'gray')
                        ->with('width', 32)
                        ->with('height', 32);
            });
    
    }

    public function formdemo() {

        dump(request()->all());
        sleep(2);

        return redirect('styleguide')->with('alert', 'We are back from PHP');

    }

}
