<?php

namespace App;


class Content
{

    protected $content = [

        [
            'title' => 'Palun aidake paari vastusega-USA',
            'body' => 'Tere tripi pere. Sooviksin perega (mina, abikaasa ja 6 aastane) külastada Los Angelest aprill 2017 Mul on paar küsimust (ja kindlasti tuhat veel) aga ennekõike see ESTA teema.  Passid on meil kõigil olemas, kas tohin selle ESTA juba ära teha? Olen lugenud, et osad ostavad piletid enne ja siis teevad ESTA ja saavad eitava vastuse.',
            'comments' => [
                [
                    'body' => 'ESTA võib ikka ära teha. See kehtib kaks aastat kui passid vahepeal kehtivust ei kaota. Ühe kaardiga võid vabalt maksta. Enda peal järgi proovitud. Pileteid võib juba praegu vaatama hakata. Alles olid siin soodukad alla neljasaja mis on päris hea hind. Minu isiklik arvamus on, et LA-s pole midagi nii kaua teha aga see puhtalt minu isiklik arvamus. Alustuseks loe läbi siin tripis varasemalt olnud teemad lääneranniku kohta. Tekiib vast mõtteid kuhu sealkandis minna mida teha. Ja ilma autota läheb keeruliseks kuigi on võimalik.',
                ],
                [
                    'body' => 'Soovitaksin Los Angelsi ja California asemel enamik puhkusest veeta kõrval asuvas Nevada osariigis , Las Vegas jne. Palju odavam ja turvalisem paik kui California.Ilma autota on väga raske liikuda aga Los Angelisi linnaliikus on ka väga raske .Väljaspool linna on lihtsam.',
                ],
            ]
        ]
    
    ];

    public function __construct()
    {
        
        $faker = \Faker\Factory::create();
        $image = 'https://unsplash.it/200';

        $this->content = collect();

        foreach(range(1,5) as $id) {

            $this->content->push((object) [
                'id' => $id,
                'title' => rtrim($faker->text(20),'.'),
                'body' => $faker->paragraph(10)
            ]);

        }    
       
    }

    public function find($index)
    {

        return $this->content;

    }

}
