<?php

namespace App\Http\Controllers;

use App;

class TestController extends Controller {

    public function index() {

        return view('pages.test')
            ->with('test', component2('Test')->is('yellow')->with('title', 'Hello'));

    }

}
