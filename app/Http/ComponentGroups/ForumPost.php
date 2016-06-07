<?php

namespace App\Http\ComponentGroups;

use Request;

class ForumPost {

    public function render(Request $request, $content)
    {

        return component('Placeholder')
            ->with('title', $content->title);

    }

}