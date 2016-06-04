<?php

use App\Helpers;

function component($component, $with = []) {

    return (new Helpers\Component($component, $with));
        
}

function componentGroup($component, ...$arguments) {

    $class = "\App\Http\ComponentGroups\\$component";
    return (new $class)->render(...$arguments);
        
}

function region($component, ...$arguments) {

    return componentGroup($component, ...$arguments);
        
}

function pattern($component, ...$arguments) {

    return componentGroup($component, ...$arguments);
        
}