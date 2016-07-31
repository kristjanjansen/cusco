<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Footer {

    protected function prepareLinks($menuKey)
    {
        return collect(config("menu.$menuKey"))
            ->map(function($value, $key) use ($menuKey) {
                return (object) [
                    'title' => trans("menu.$menuKey.$key"),
                    'route' => $value['route'],
                    'icon' => $value['icon'] ?? '',
                    'target' => isset($value['external']) ? '_blank' : ''    
                ];
            });
    }

    public function render(Request $request)
    {   
        return component('Footer')
            ->with('image', '/samples/footer.jpg')
            ->with('logo', component('Icon')
                ->with('name', 'tripee_logo_plain')
                ->with('width', '100')
                ->with('height', '25')
                ->with('color', 'white')
            )
            ->with('links', [
                'col1' => $this->prepareLinks('footer'),
                'col2' => $this->prepareLinks('footer2'),
                'col3' => $this->prepareLinks('footer3'),
                'social' => $this->prepareLinks('footer-social'),
            ])
            ->with('licence', trans('site.footer.copyright', [
                'current_year' => Carbon::now()->year
            ]));
    }

}