<?php

namespace App\Http\Composers;

use App;
use Request;

class HeaderComposer {

    public function compose(Request $request) {

        return [

            'component' => 'Header',
            'top_left' => App\Composers\MenuComposer($request),
            'top_right' => [
                [
                    'component' => App\Composers\UserMenuLogged($request),
                    'show' => $request->user()-check()
                ],
                [
                    'component' => App\Composers\UserMenuNonLogged($request),
                    'show' => ! $request->user()-check()
                ]
            ]
        ];

}


//php

//namespace App\Http\Controllers;

//use App;
//use Request;
//use App\Http\Composers;

class FrontpageController extends Controller {

    public function index(Request $request) {

        $regions = (object) [];

        $regions->header = Composers\Header::compose();
        $regions->header->componentName = 'FrontpageHeader';

        $regions->top_offers = [

            'component' => 'FrontpageTopOffers',
            'show' => $request->user()->can('see-offers'),
            'data' => ['offers' => App\Offers::frontpageTop()]
        
        ];

        $regions->main = [
            [
                'component' => 'FrontpageMainNews',
                'show' => true,
                'data' => ['offers' => App\News::frontpagePrimary()]
            ]
        ];

        $regions = $regions->reject(function($region))

        return pageView('frontpage', $regions);

    }

}
