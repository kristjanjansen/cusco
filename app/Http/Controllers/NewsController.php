<?php

namespace App\Http\Controllers;

use App;
use Request;

class NewsController extends Controller {

    public function show($id) {

        $post = (new App\Content)->find((int)$id);

        return view('layouts.1col')
            ->with('header', componentGroup('Masthead', $post->title)) 
            ->with('content', collect()
                ->push(component('Body')->is('responsive')->with('body', $post->body))
                ->merge(componentGroup('Comments', $post->comments))
                ->push(componentGroup('CommentCreateForm'))
            )
            ->with('footer', componentGroup('Footer'));
      
    }

}