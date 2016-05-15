<?php

namespace App\Helpers;

use View;

class Blade {

    public static function bladeComponent($selector, $data = []) {

        $component = self::parseSelector($selector);

        $name = "components.$component->name.$component->name";

        if (view()->exists($name)) {

        
            return View::make($name, array_except(get_defined_vars(), array('__data', '__path')))
                ->with($data)
                ->with(['modifiers' => $component->modifiers])
                ->render();
        
        } else {

            return '<component is="'
                . $component->name
                . '" modifiers="'
                . $component->modifiers
                . '" variables="'
                . rawurlencode(json_encode($data))
                . '" />';
        }

    }

    public static function vueComponent($selector, $data = []) {
                
        $component = self::parseSelector($selector);

        return '<component is="'
            . $component->name
            . '" modifiers="'
            . $component->modifiers
            . '" variables="'
            . rawurlencode(json_encode($data))
            . '" />';

    }

    protected static function parseSelector($selector) {

        $classes = collect(explode(' ', $selector));

        $name = $classes->first();
        $modifiers ='';

        if ($classes->count() > 1) {

            $classes->shift();

            $modifiers = $classes
                ->map(function($class) use ($name) {
                    return $name . $class;
                })
                ->implode(' ');
        
        }

        return (object) ['name' => $name, 'modifiers' => $modifiers];

    }

}