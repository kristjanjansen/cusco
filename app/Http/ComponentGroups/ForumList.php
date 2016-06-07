<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class ForumList {

    public function render(Request $request, $posts)
    {

        return $posts->map(function($post) {
          
            return component('ListItem')
                ->with('figure', component('ProfileImage')
                    ->with('image', $post->user->image)
                )
                ->with('title', $post->title)
                ->with('subtitle', 'hello')
                ->with('subsubtitle', $post->tags->map(function($tag) {
                    return component('Tag')->with('title', $tag->title)->render();
                })->implode(' '))
                ->with('meta', $post->meta);
       
        });
    
    }

}