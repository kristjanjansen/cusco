<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Footer {

    public function render(Request $request)
    {

        return component('Footer')
            ->with('image', '/samples/footer.jpg')
            ->with('logo', '')
            ->with('links', [
                'col1' => ['First link', 'Second link'],
                'col2' => ['First link', 'Second link'],
                'col3' => ['First link', 'Second link'],
                'social' => ['First link', 'Second link'],
            ])
            ->with('licence', 'Licence');

    }

}