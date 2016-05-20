<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>

        @component('FrontpageHeader', [
            'image' => 'http://www.plexmx.info/wp-content/uploads/2015/03/lone-wolf-mcquade-chuck-norris-david-carradine-jpg-1766863898.jpg',
            'top' =>
                component('HeaderMenu', ['links' => ['Trip.ee', 'Flights', 'Travelmates', 'Blogs', 'Log in']]),
            'bottom' => component('HeaderTitle', ['title' => 'Kick it hard'])
        ])
        
        <div class="region-one">

        <div class="container">

        <div class="row">

                <div class="col padding-right-collapse-sm padding-topbottom-md">

                    @component('Display', [
                        'image' => 'http://cdn2.fightstate.com/wp-content/uploads/2015/08/Bruce-Lee-and-Chuck-Norris-taking-a-break-on-the-set-of-The-Way-of-the-Dragon.jpg',
                        'title' => 'True Love'
                    ])

                </div>  

                <div class="col padding-left-collapse-sm padding-topbottom-md">

                    @component('Body', ['body' => '<p>Tang Lung arrives in Rome to help his cousins in the restaurant business. They are being pressured to sell their property to the syndicate, who will stop at nothing to get what they want.</p><h3>A new threat</h3><p>When Tang arrives he poses a new threat to the syndicate, and they are unable to defeat him. The syndicate boss hires the best Japanese and European martial artists to fight Tang, but he easily finishes them off. The American martial artist Colt is hired and has a showdown with Tang in Romes famous Colosseum.'])

                </div>

        </div>

        </div>

        </div>



        <div class="container">

        <div class="row">

                <div class="col padding-right-collapse-sm">

                    @component('Comment--border', [
                        'left' => component('UserImage', [
                            'image' => 'http://bzfilm.com/wp-content/uploads/2012/01/norris-blackw.jpg'
                        ]),
                        'right' => component('Body', ['body' => '<p>Craft beer helvetica portland ethical chia, polaroid salvia 90 cliche tousled. Blue bottle semiotics humblebrag wolf etsy bitters blog, cornhole master cleanse food truck'
                        ])
                    ])

                </div>  

                <div class="col padding-left-collapse-sm padding-topbottom-md">

                    @component('Body', ['body' => '<p>J.J. McQuade is a Texas Ranger who doesnt exactly follow the rules, is unruly, and prefers to work alone, which earns the nickname, Lone Wolf McQuade. When he discovers some criminals have automatic weapons, he discovers that they were stolen from the military. He tries to handle on his own, as usual, but in the end, an old friend, and a prisoner, whom he was keeping under wraps, are killed. He is then relieved of duty. But then an FBI agent, who also wants to get these guys, offers to help McQuade, and along with a rookie, they track down the mastermind.</p>'])

                </div>

        </div>

        </div>

        <script src="/js/main.js"></script>
    </body>
</html>
