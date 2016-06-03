<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>

    @foreach($components as $component)

        @foreach($component->is as $is)
        
        <div class="styleguide container">
            
            <div class="styleguide-title">{{ $component->name.$is }}</div>

        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component2($component->name, [$component->data])->is($is) !!}
                
        </div>

        @endforeach

    @endforeach

        <script src="/js/main.js"></script>
    </body>
</html>