<?php

namespace App\Http\Controllers;

use App;

class ForumController extends Controller {

    public function index() {

        $posts = (new App\Content)->get();

        return view('pages.forum')

            ->with('header', component('ForumHeader')) 

            ->with('contents', collect()
                ->merge(componentGroup('ForumList', $posts->forPage(1, 4)))
                ->push(component('Promo')->with('route', '/promo'))
                ->merge(componentGroup('ForumList', $posts->forPage(2, 4)))
            );
    
    }

    public function show($id) {

        $post = (new App\Content)->find((int)$id);

        return view('pages.forum')

            ->with('header', component('ForumHeader')) 
           
            ->with('contents', collect()
                    ->push(componentGroup('ForumPost', $post))
                    ->push(component('Promo')->with('route', '/promo'))

                    ->merge($post->comments->map(function($comment) {
                        return component('ForumPost')
                            ->with('user', component('ProfileImage')
                                ->with('image', $comment->user->image)
                                ->is('small')
                            )
                            ->with('title', '')
                            ->with('meta', $comment->meta)
                            ->with('body', $comment->body)
                            ->render();
                        })
                    )
        
            );
    }

}
