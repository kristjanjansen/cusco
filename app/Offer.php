<?php

namespace App;


class Offer
{

    protected static $offers = [

        [
            'title' => 'World',
            'image' => 'http://www.gamesvillage.it/wp-content/uploads/2014/07/chuck-norris-bruce-lee-colosseo-1024x795.jpg'
        ],
        [
            'title' => 'Now',
            'image' => 'http://2.bp.blogspot.com/-tTjKTQlQKHo/UR03zASXCLI/AAAAAAAADEc/scsyqW3QSLY/s1600/Chuck+Norris+in+Way+of+the+Dragon.jpg'
        ]

    ];

    public static function getRandom()
    {

        return collect(self::$offers)
            ->map(function($offer) { return (object) $offer; })
            ->shuffle()
            ->toJson();

    }

}
