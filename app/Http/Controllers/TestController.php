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
                    ->with('links', ['First link'])
                    ->with('sublinks', ['Second link'])
                )
            )
            ->with('sidebar', collect());    
    
    }

}
