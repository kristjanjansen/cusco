<?php

namespace App\Http\Controllers;

use App;

class ForumController extends Controller {

    public function index() {

        $posts = (new App\Content)->get();

        return view('layouts.2col')
            ->with('header', componentGroup('Masthead', 'Forum'))
            ->with('content', collect()
                ->merge(componentGroup('ForumList', $posts->forPage(1, 4)))
                ->push(component('Promo')->with('route', '/promo'))
                ->merge(componentGroup('ForumList', $posts->forPage(2, 4)))
            )
            ->with('sidebar', collect()
                ->push(componentGroup('ForumAbout'))
            )
            ->with('footer', componentGroup('Footer')) 
        ;

    }

    public function show($id) {

        $post = (new App\Content)->find((int)$id);

        return view('layouts.2col')
            ->with('header', component('ForumHeader')) 
            ->with('content', collect()
                ->push(componentGroup('ForumPost', $post))
                ->push(component('Promo')->with('route', '/promo'))
                ->merge(componentGroup('ForumComments', $post->comments))
            )
            ->with('sidebar', collect()
                ->push(componentGroup('ForumAbout'))
            )
        ;
    
    }

}
