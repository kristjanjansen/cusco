<?php

namespace App\Http\Controllers;

use App;
use Request;
use Response;
use Markdown;

class HelpersController extends Controller {

    public function render() {

        $body = Request::input('body');
        $body = Markdown::setBreaksEnabled(true)->text($body);

        $images = (new App\Image)->get();
        $imagePattern = '/\[\[([0-9]+)\]\]/';
        
        if (preg_match_all($imagePattern, $body, $matches)) {
            foreach ($matches[1] as $match) {
                if (isset($images[$match])) {
                    $body = str_replace(
                        "[[$match]]",
                        '<img src="'.$images[$match].'" />',
                        $body
                    );
                }
            }
        }

        return Response::json([
            'body' => $body
        ]);

    }

}
