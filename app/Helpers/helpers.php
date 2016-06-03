<?php

use App\Helpers;

function component($selector, $data = []) {

    return Helpers\Blade::bladeComponent($selector, $data);
        
}

function component2($component, $with = []) {

    return (new Helpers\Component($component, $with));
        
}

function componentGroup($component, ...$arguments) {

    $class = "\App\Http\ComponentGroups\\$component";
    return (new $class)->render(...$arguments);
        
}