<div
    class="Masthead {{ $isclasses }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)
        ),
    url({{ $image }});"
>    
    <div class="container">
    
        <div class="Masthead__header">

            <div class="Masthead__search">

                {!! $search !!}

            </div>

            <div class="Masthead__smalllogo">

                {!! $smalllogo !!}

            </div>

            <div class="Masthead__navbarDesktop">

                {!! $navbar_desktop !!}

            </div>

            <div class="Masthead__navbarMobile">

                {!! $navbar_mobile !!}

            </div>

        </div>

        <div class="Masthead__wrapper">

            <div class="Masthead__content">
            
            <div class="Masthead__logo">

            {!! $logo !!}

            </div>

            <div class="Masthead__title">

            {!! $title !!}

            </div>

            </div>

        </div>

    </div>

</div>