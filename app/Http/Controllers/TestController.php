<?php

namespace App\Http\Controllers;

use App;

class TestController extends Controller {

    public function index() {

        $content = (new App\Content)->find(1);

        return view('pages.test')
            ->with('contents', collect()
                ->push(component('Body')->with('body', '<p>Hello</p>'))
                ->push($content->comments->render(function($post) {
                        return component('Placeholder')->with('title', $post->body);
                    })
                )
            );
    }

}
