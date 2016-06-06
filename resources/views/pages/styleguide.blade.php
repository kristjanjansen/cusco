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

        <div class="container" style="
            height: 100px;
            font-family: monospace;
            display: flex;
            align-items: center;
            color: #777;
        ">
                        
            {{ $component->name }}

        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->with]) !!}
                
        </div>

        @foreach($component->is as $is)
        
        <div class="container" style="
            height: 100px;
            font-family: monospace;
            display: flex;
            align-items: center;
            color: #777;
        ">
                        
            {{ $component->name }}
            {{ component($component->name)->is($is)->generateIsClasses() }}

        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->with])->is($is) !!}
                
        </div>

        @endforeach

    @endforeach

        <script src="/js/main.js"></script>
    </body>
</html>