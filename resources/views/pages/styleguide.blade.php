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

        @foreach($component->modifiers as $modifier)
        
        <div class="styleguide container">
            
            <div class="styleguide-title">{{ $component->name.$modifier }}</div>


        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name.$modifier, $component->data) !!}
                
        </div>

        @endforeach

    @endforeach

        <script src="/js/main.js"></script>
    </body>
</html>