<?php

use App\Helpers;

function component($selector, $data = []) {

    return Helpers\Blade::bladeComponent($selector, $data);
        
}

function component2($component) {

    return (new Helpers\Component($component));
        
}

function componentGroup($component, ...$arguments) {

    $class = "\App\Http\ComponentGroups\\$component";
    return (new $class)->render(...$arguments);
        
}