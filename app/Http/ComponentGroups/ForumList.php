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
                ->with('route', 'forum/'.$post->id)
                ->with('subtitle', $post->meta);
       
        });
    
    }

}