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
            'top' => component('HeaderMenu', ['links' => ['Q', 'Trip.ee', 'Flights', 'Travelmates']]),
            'bottom' => 'Bottom'
        ])
        
        <div class="region-one">

        <div class="container">

        <div class="row">

                <div class="col">

                    @component('Media--border', [
                        'aside' => component('UserImage', [
                            'image' => 'https://38.media.tumblr.com/avatar_924462799b59_128.png'
                        ]),
                        'body' => component('Body', ['body' => '<p>Craft beer helvetica portland ethical chia, polaroid salvia 90 cliche tousled. Blue bottle semiotics humblebrag wolf etsy bitters blog, cornhole master cleanse food truck'
                        ])
                    ])

                    @component('Alert', ['title' => 'I am an alert.'])

                </div>  

                <div class="col padding-leftright-collapse-md padding-topbottom-md">

                    @component('Display', [
                        'image' => 'http://www.plexmx.info/wp-content/uploads/2015/03/lone-wolf-mcquade-chuck-norris-david-carradine-jpg-1766863898.jpg',
                        'title' => 'Craft beer helvetica portland...'
                    ])

                    @component('Body', ['body' => '<p>Ennui flannel offal next level pork belly. Fap before they sold out wolf cardigan vegan, waistcoat bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p>try-hard. Deep v blue bottle four dollar toast, pork belly YOLO direct trade 90 cold-pressed beard photo booth selvage craft beer. Craft beer helvetica portland ethical chia, polaroid salvia 90 cliche tousled. Blue bottle semiotics humblebrag wolf etsy bitters blog, cornhole master cleanse food truck everyday carry pop-up cray lomo. Deep v farm-to-table poutine, cardigan brooklyn godard iPhone post-ironic thundercats authentic bitters.</p>'])

                </div>

        </div>

        </div>

        </div>

        <script src="/js/main.js"></script>
    </body>
</html>
