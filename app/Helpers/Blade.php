<?php

namespace App\Helpers;

use View;

class Blade {

    public static function bladeComponent($name, $data = []) {

        $name = "components.$name.component";

        return View::make($name, array_except(get_defined_vars(), array('__data', '__path')))
            ->with($data)
            ->render();

    }

    public static function vueComponent($name, $data = []) {
            
        //$name = camel_case(str_replace('.', '_', $name . '.show'));

        return '<component is="' . $name . '" variables="' . rawurlencode(json_encode($data)) . '" />';

    }

}