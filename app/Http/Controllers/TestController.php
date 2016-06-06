<?php

namespace App\Http\Controllers;

use App;

class TestController extends Controller {

    public function index() {

        $post = (new App\Content)->find(1);

        return view('pages.test')
            ->with('contents', [
                    component('ForumPost')
                        ->with('user', component('ProfileImage')
                            ->with('image', 'http://placekitten.com/96/96')
                        )
                        ->with('title', $post->title)
                        ->with('meta', $post->meta)
                        ->with('body', $post->body),
                    $post->comments->render(function($comment) {
                        return component('ForumPost')
                            ->with('user', component('ProfileImage')
                                ->with('image', 'http://placekitten.com/96/96')
                            )
                            ->with('title', '')
                            ->with('meta', $comment->meta)
                            ->with('body', $comment->body);
                    })
                ]
            );
    }

}
