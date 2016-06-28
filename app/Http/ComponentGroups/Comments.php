<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Comments {

    public function render(Request $request, $comments)
    {

        return $comments->map(function($comment) {
            return component('Comment')
                ->with('user', component('ProfileImage')
                    ->with('image', $comment->user->image)
                    ->is('small')
                )
                ->with('title', '')
                ->with('meta', $comment->meta)
                ->with('body', component('Body')->is('responsive')->with('body', $comment->body))
                ->with('tags', '')
                ->with('flags', '')
                ->render();
            });

    }

}