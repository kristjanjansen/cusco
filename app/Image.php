<?php

namespace App;

use Storage;

class Image
{

    public function get()
    {

        return collect(Storage::disk('root')->files('public/images'))
        ->filter(function($filename) {
            return pathinfo($filename, PATHINFO_EXTENSION) == 'jpg';
        })->map(function($filename) {
            return str_replace('public', '', $filename);
        });


    }

}
