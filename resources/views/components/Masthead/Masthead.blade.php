<div
    class="Masthead {{ $is }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.75),
            rgba(0, 0, 0, 0.75)
        ),
    url({{ $image }});"
>    
    <div class="Masthead__nav container">

        {!! $nav !!}

    </div>

    <div class="Masthead__title container">

        {!! $title !!}

    </div>

</div>