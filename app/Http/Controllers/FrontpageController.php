<?php

namespace App\Http\Controllers;

use App;

class FrontpageController extends Controller {

    public function index() {

        return view('pages.frontpage');

    }

}
