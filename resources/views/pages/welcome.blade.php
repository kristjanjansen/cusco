<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        
        <div class="region-one">

        <div class="container">

        <div class="Grid Grid--fit">

                <div class="Grid-cell">

                    @component('Row', [
                        'aside' => component('UserImage', [
                            'image' => 'http://lorempixel.com/g/64/64/'
                        ]),
                        'body' => component('Body', ['body' => '<p>Craft beer helvetica portland ethical chia, polaroid salvia 90 cliche tousled. Blue bottle semiotics humblebrag wolf etsy bitters blog, cornhole master cleanse food truck'
                        ])
                    ])

                    @component('Alert', ['title' => 'I am an alert.'])

                </div>  

                <div class="Grid-cell padding-leftright-collapse-md padding-topbottom-md">

                    @component('Body', ['body' => '<p>Ennui flannel offal next level pork belly. Fap before they sold out wolf cardigan vegan, waistcoat bitters four loko listicle synth church-key you probably havent heard of them keffiyeh sriracha.</p><h3>Gentrify etsy chartreuse</h3><p>try-hard. Deep v blue bottle four dollar toast, pork belly YOLO direct trade 90 cold-pressed beard photo booth selvage craft beer. Craft beer helvetica portland ethical chia, polaroid salvia 90 cliche tousled. Blue bottle semiotics humblebrag wolf etsy bitters blog, cornhole master cleanse food truck everyday carry pop-up cray lomo. Deep v farm-to-table poutine, cardigan brooklyn godard iPhone post-ironic thundercats authentic bitters.</p>'])

                </div>

        </div>

        </div>

        </div>

        <script src="/js/main.js"></script>
    </body>
</html>
