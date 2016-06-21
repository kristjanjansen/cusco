<?php

namespace App\Http\Controllers;

use App;

class FrontpageController extends Controller {

    public function index() {

        return collect([
            '/styleguide',
            '/content/forum',
            '/content/forum/1'
        ])->map(function($link) {
            return "<a href=\"$link\" style=\"display: block; color: #777; padding: 5px; font-family: monospace;\">$link</a>";
        })->implode('');

    }

}
