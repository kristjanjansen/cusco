<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class ForumPost {

    public function render(Request $request, $post)
    {

        return component('ForumPost')
            ->with('user', component('ProfileImage')
                ->with('image', $post->user->image)
            )
            ->with('title', $post->title)
            ->with('meta', $post->meta)
            ->with('body', $post->body);

    }

}