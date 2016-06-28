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
                ->push(component('Alert')->with('alert', 'hello'))

                ->push(component('StyleguideHeader')->with('title', 'AlertDemo'))
                ->push(component('AlertDemo'))

                ->push(component('StyleguideHeader')->with('title', 'Arc'))
                ->push(component('Arc')->with('border', '10'))

                ->push(component('StyleguideHeader')->with('title', 'Block'))
                ->push(component('Block')
                    ->with('title', 'Title')
                    ->with('content', collect(['First item', 'Second item'])))

                ->push(component('StyleguideHeader')->with('title', 'Block'))
                ->push(component('Block')
                    ->is('withBackground')
                    ->with('title', 'Title')
                    ->with('content', collect(['First item', 'Second item'])))

                ->push(component('StyleguideHeader')->with('title', 'Body'))
                ->push(component('Body')->with('body', '<p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

                ->push(component('StyleguideHeader')->with('title', 'Responsive body'))
                ->push(component('Body')->is('responsive')->with('body', '<p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p> trade 90 cold-pressed beard photo booth selvage craft</p>'))

                ->push(component('StyleguideHeader')->with('title', 'Button'))
                ->push(component('Button')->with('title', 'I am button'))
                ->push(component('Button')->is('wide')->with('title', 'I am wide button'))

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
                    ->with('action', '/formdemo')
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

                ->push(component('StyleguideHeader')->with('title', 'FormButton'))
                ->push(component('FormButton')->with('title', 'Save'))

                ->push(component('FormFooter'))

                ->push(component('StyleguideHeader')->with('title', 'Icon'))
                ->push(component('Icon')->with('name', 'icon-car'))

                ->push(component('StyleguideHeader')->with('title', 'ImageUpload'))
                ->push(component('ImageUpload'))

                ->push(component('StyleguideHeader')->with('title', 'ListItem'))
                ->push(component('ListItem')
                    ->with('figure', '')
                    ->with('title', '')
                    ->with('subtitle', '')
                    ->with('subsubtitle', '')
                )

                ->push(component('StyleguideHeader')->with('title', 'Map'))
                ->push(component('Map'))

                ->push(component('StyleguideHeader')->with('title', 'Masthead'))
                ->push(component('Masthead')
                    ->with('image', '/samples/header.jpg')
                    ->with('search', '')
                    ->with('smalllogo', '')
                    ->with('navbar', '')
                    ->with('navbar_mobile', '')
                    ->with('logo', '')
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

        );

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
                        ->with('color', 'orange')
                        ->with('width', 32)
                        ->with('height', 32);
            });
    
    }

    public function formdemo() {

        dump(request()->all());
        sleep(1);

        return redirect('styleguide')->with('alert', 'We are back from PHP');

    }

}
