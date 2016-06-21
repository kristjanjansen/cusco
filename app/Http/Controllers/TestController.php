<?php

namespace App\Http\Controllers;

use App;
use Request;

class TestController extends Controller {

    public function index() {

        return view('pages.forum')
            ->with('header', '')
            ->with('content', collect()
                ->push(component('Alert')->with('alert', 'hello'))
                ->push(component('Arc')->with('border', '10'))
                ->push(component('Icon')->with('name', 'icon-car'))
                ->push(component('ImageUpload'))
                ->push(component('NavbarMobile')
                    ->with('links', ['First link', 'Second link'])
                    ->with('sublinks', ['Third link'])
                )
                
      //          ->push(component('FormSelect'))

                ->push(component('Promo')->with('route', '/promo'))
                ->push(component('AlertDemo'))
                ->push(component('Editor'))
            )
            ->with('sidebar', collect());    
    
    }

}
