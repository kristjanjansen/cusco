<?php

namespace App\Http\Controllers;

use App;
use Request;

class TestController extends Controller {

    public function index() {

        return view('layouts.1col')
            ->with('header', '')
            ->with('content', collect()

                ->push(component('Alert')->with('alert', 'hello'))

                ->push(component('AlertDemo'))

                ->push(component('Arc')->with('border', '10'))

                ->push(component('Block')
                    ->with('title', 'Title')
                    ->with('content', collect(['First', 'Second'])))

                ->push(component('Body')->with('body', '<p>Ennui flannel offal next level bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p>try- hard. Deep v blue bottle four dollar toast, pork belly direct trade 90 cold-pressed beard photo booth selvage craft</p>'))

                ->push(component('Button')->with('title', 'I am button'))
                ->push(component('Button')->is('wide')->with('title', 'I am wide button'))

                ->push(component('Editor'))

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

                ->push(component('FormTextfield')
                    ->with('name', 'title')
                    ->with('label', 'Title')
                    ->with('value', 'Hello'))

                ->push(component('FormTextarea')
                    ->with('name', 'body')
                    ->with('label', 'Body')
                    ->with('value', 'World')
                )

                ->push(component('FormButton')->with('title', 'Save'))

                ->push(component('FormFooter'))

                ->push(component('Icon')->with('name', 'icon-car'))

                ->push(component('ImageUpload'))

                ->push(component('ListItem')
                    ->with('figure', '')
                    ->with('title', '')
                    ->with('subtitle', '')
                    ->with('subsubtitle', '')
                )

                ->push(component('Map'))

                ->push(component('Masthead')
                    ->with('image', '/samples/header.jpg')
                    ->with('search', '')
                    ->with('smalllogo', '')
                    ->with('navbar', '')
                    ->with('navbar_mobile', '')
                    ->with('logo', '')
                    ->with('title', 'Title')
                )

                ->push(component('Navbar')
                    ->with('links', ['First link', 'Second link'])
                    ->with('sublinks', ['Third link'])
                )

                ->push(component('NavbarMobile')
                    ->with('links', ['First link', 'Second link'])
                    ->with('sublinks', ['Third link'])
                )
                
                ->push(component('ProfileImage')->with('image', '/samples/norris.jpg'))

                ->push(component('Promo')->with('route', '/promo'))

                ->push(component('Tag')->with('title', 'I am tag'))

        )
        ->with('sidebar', collect());    
    
    }

}
