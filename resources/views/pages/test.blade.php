<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>

        @foreach ($contents as $content)
            <div class="container margin-bottom-md">

                {!! $content !!}
                
            </div>

        @endforeach
        
        <script src="/js/main.js"></script>
    </body>
</html>
