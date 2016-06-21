<?php

namespace App\Http\Controllers;

use App;
use Request;
use Response;

class ImageController extends Controller {

    public function index() {

        $images = (new App\Image)->get()->toArray();

        return Response::json($images);

    }

    public function store() {

        $image = Request::file('image');

        $imagename = 'image-' . rand(1,3) . '.' .$image->getClientOriginalExtension();
        $image->move(public_path() . '/images/' , $imagename);

        return Response::json([
            'image' => '/images/'. $imagename
        ]);

    }

}
