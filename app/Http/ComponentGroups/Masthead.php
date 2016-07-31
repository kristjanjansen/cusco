<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Masthead {

 
    public function render(Request $request, $title)
    {

        return component('Masthead')
            ->with('title', $title)
            ->with('image', '/samples/header.jpg')
            ->with('search', component('Icon')
                ->with('name', 'icon-search')
                ->with('color', 'white')
            )
            ->with('logo', component('Icon')
                ->with('name', 'tripee_logo')
                ->with('width', 200)
                ->with('height', 120)
            )
            ->with('smalllogo', component('Icon')
                ->with('name', 'tripee_logo_plain')
                ->with('width', 120)
                ->with('height', 80)
                ->with('color', 'white')
            )
            ->with('navbar', componentGroup('Navbar'));
    }

}