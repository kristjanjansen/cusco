<?php

use App\Helpers;
use Illuminate\Http\Request;

function component($component, $with = []) {

    return (new Helpers\Component($component, $with));
        
}

function componentGroup($component, ...$arguments) {

    $class = "\App\Http\ComponentGroups\\$component";
    return (new $class)->render(new Request, ...$arguments);
        
}

function region($component, ...$arguments) {

    return componentGroup($component, ...$arguments);
        
}

function pattern($component, ...$arguments) {

    return componentGroup($component, ...$arguments);
        
}

function module($component, ...$arguments) {

    return componentGroup($component, ...$arguments);
        
}