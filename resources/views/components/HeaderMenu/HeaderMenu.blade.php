<div class="HeaderMenu {{ $modifiers }} ">

    <div class="HeaderMenu__hamburger">

        <div class="HeaderMenu__link">

            ≡

        </div> 

    </div>

    <div class="HeaderMenu__links">

    @foreach($links as $link)

        <div class="HeaderMenu__link">

            {{ $link }}

        </div>
        
    @endforeach

    </div>

</div>