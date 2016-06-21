<?php

namespace App\Http\Controllers;

use App;
use Request;

class NewsController extends Controller {

    public function create() {

        return view('pages.forum')
            ->with('header', component('ForumHeader')) 
            ->with('content', collect()
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
                    ->with('value', 'World'))
                ->push(component('FormButton')
                    ->with('title', 'Save'))
                ->push(component('FormFooter'))
            )
            ->with('sidebar', collect()
                ->push(componentGroup('ForumAbout'))
            );        
    
    }

    public function store() {

        dump(request()->all());
    
        return redirect('styleguide')->with('alert', 'We are back');

    }

}
