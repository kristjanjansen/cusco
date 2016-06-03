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

        <div class="styleguide container">
            
            <div class="styleguide-title">
            
                {{ $component->name }}

            </div>

        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->data]) !!}
                
        </div>

        @foreach($component->is as $is)
        
        <div class="styleguide container">
            
            <div class="styleguide-title">
            
                {{ $component->name }}
                {{ component($component->name)->is($is)->generateIsClasses() }}

            </div>

        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->data])->is($is) !!}
                
        </div>

        @endforeach

    @endforeach

        <script src="/js/main.js"></script>
    </body>
</html>