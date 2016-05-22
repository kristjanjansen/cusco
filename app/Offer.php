<?php

namespace App;


class Offer
{

    protected static $offers = [

        [
            'title' => 'Dynamic duo',
            'image' => 'http://www.gamesvillage.it/wp-content/uploads/2014/07/chuck-norris-bruce-lee-colosseo-1024x795.jpg'
        ],
        [
            'title' => 'Get down',
            'image' => 'http://2.bp.blogspot.com/-tTjKTQlQKHo/UR03zASXCLI/AAAAAAAADEc/scsyqW3QSLY/s1600/Chuck+Norris+in+Way+of+the+Dragon.jpg'
        ],
        [
            'title' => 'Hanging out',
            'image' => 'http://cdn2.fightstate.com/wp-content/uploads/2015/08/Bruce-Lee-and-Chuck-Norris-taking-a-break-on-the-set-of-The-Way-of-the-Dragon.jpg?2233d5'
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
