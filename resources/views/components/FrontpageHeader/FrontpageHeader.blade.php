<div
    class="FrontpageHeader {{ $modifiers }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.75),
            rgba(0, 0, 0, 0.75)
        ),
    url({{ $image }});"
>    
    <div class="FrontpageHeader__top container">

        {!! $top or component('Placeholder', ['title' => '$top']) !!}

    </div>

    <div class="FrontpageHeader__bottom container">

        {!! $top or component('Placeholder', ['title' => '$bottom']) !!}

    </div>

</div>