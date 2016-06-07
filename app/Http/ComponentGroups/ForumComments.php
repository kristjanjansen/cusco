<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class ForumComments {

    public function render(Request $request, $comments)
    {

        return $comments->map(function($comment) {
            return component('ForumPost')
                ->with('user', component('ProfileImage')
                    ->with('image', $comment->user->image)
                    ->is('small')
                )
                ->with('title', '')
                ->with('meta', $comment->meta)
                ->with('body', $comment->body)
                ->render();
            });

    }

}