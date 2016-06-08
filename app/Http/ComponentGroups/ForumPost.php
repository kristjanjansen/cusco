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
            ->with('body', $post->body)
            ->with('tags', $post->tags->map(function($tag) {
                    return component('Tag')->with('title', $tag->title)->render();
                })->implode(' ')
            )
            ->with('flags', '');

    }

}