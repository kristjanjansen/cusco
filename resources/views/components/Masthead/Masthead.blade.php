<div
    class="Masthead {{ $is }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.75),
            rgba(0, 0, 0, 0.75)
        ),
    url({{ $image }});"
>    
    <div class="container">
    
        <div class="Masthead__header">

            <div class="Masthead__logo">

                {!! $logo !!}

            </div>

            <div class="Masthead__nav">

                {!! $nav !!}

            </div>

            <div class="Masthead__mobileNav">

                {!! $mobile_nav !!}

            </div>

        </div>

        <div class="Masthead__title">

        {!! $title !!}

        </div>

    </div>

</div>