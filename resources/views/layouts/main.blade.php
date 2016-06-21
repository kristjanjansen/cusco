<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta id="token" name="token" content="{{ csrf_token() }}">
        <meta id="globalvars" name="globalvars" content="
            {{
                rawurlencode(json_encode([
                    'token' => csrf_token(),
                    'alert' => session('alert')
                ])) 
            }}
        ">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>

        <component is="IconLoader" route="/svg/main.svg"></component>

        @yield('header')
        @yield('content')
        
        <script src="/js/main.js"></script>
        
    </body>
</html>
