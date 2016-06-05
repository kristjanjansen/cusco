<?php

namespace App;


class Content
{

   
    public function __construct()
    {
        
        $faker = \Faker\Factory::create();

        $this->content = collect(range(0,2))
            ->map(function($id) use ($faker) {
                return (object) [
                    'id' => $id,
                    'title' => rtrim($faker->text(20),'.'),
                    'body' => $faker->paragraph(10),
                    'comments' => collect(range(0,2))
                        ->map(function($id) use ($faker) {
                            return (object) [
                                'body' => $faker->paragraph(10),
                            ];
                        })
                ];
            });

    }

    public function get()
    {

        return $this->content;

    }

    public function find($id)
    {

        return $this->content->where('id', $id)->first();

    }

}
