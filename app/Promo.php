<?php

namespace App;

class Promo
{
    
    protected $promos;
   
    public function __construct()
    {
        
        $faker = \Faker\Factory::create();

        $this->promos = collect(range(0,2))
            ->map(function($id) use ($faker) {
                return (object) [
                    'id' => $id,
                    'title' => rtrim($faker->text(15),'.'),
                    'image' => '/images/lonewolf.jpg'
                ];
            });

    }

    public function get()
    {

        return $this->promos;

    }

    public function getRandom()
    {

        return json_encode($this->promos
                ->shuffle()
                ->first()
            );
    }

}
