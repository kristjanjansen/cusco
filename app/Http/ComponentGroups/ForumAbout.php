<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class ForumAbout {

    public function render(Request $request)
    {

        return component('Box')
            ->is('withBackground')
            ->with('title', trans('forum.about.title'))
            ->with('content', collect()
                ->push(component('Body')->with('body', trans('forum.about.body')))
                ->push(component('Button')->is('wide')->with('title', trans('forum.about.button')))
            )
        ;
    
    }

}