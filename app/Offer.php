<?php

namespace App;


class Offer
{

    protected static $offers = [
        ['title' => 'Hello'],
        ['title' => 'World'],
        ['title' => 'Now']
    ];

    public static function getRandom()
    {

        return collect(self::$offers)
            ->map(function($offer) { return (object) $offer; })
            ->shuffle()
            ->toJson();

    }

}
