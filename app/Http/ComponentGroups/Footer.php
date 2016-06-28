<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Footer {

    public function render(Request $request)
    {

        return component('Footer')
            ->with('image', '/samples/footer.jpg')
            ->with('logo', component('Icon')
                ->with('name', 'tripee_logo_plain')
                ->with('width', '100%')
                ->with('height', '25')
                ->with('color', 'white')
            )
            ->with('links', [
                'col1' => [
                    'Lennupakkumised',
                    'Reisikaaslased',
                    'Uudised',
                    'Reisikirjad',
                    'Reisipildid'
                ],
                'col2' => [
                    'Foorum',
                    'Elu välismaal',
                    'Ost-müük'
                ],
                'col3' => [
                    'Mis on Trip.ee',
                    'Kontakt',
                    'Kasutustingimused',
                    'Reklaam'
                ],
                'social' => ['Facebook', 'Twitter'],
            ])
            ->with('licence', 'Autoriõigused © Trip.ee 1998-2016');

    }

}