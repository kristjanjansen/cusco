<?php

namespace App\Http\ComponentGroups;

class Test {

    public function render($title)
    {

        return component2('Test')
        //    ->is('yellow')
        //    ->is('small')
            ->with('title', $title);
    
    }
    
}