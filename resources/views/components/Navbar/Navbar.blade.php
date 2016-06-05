<nav class="Navbar {{ $is }} ">

    <div class="Navbar__hamburger">

        <div class="Navbar__link">

            ≡

        </div> 

    </div>

    <div class="Navbar__links">

    @foreach($links as $link)

        <div class="Navbar__link">

            {{ $link }}

        </div>
        
    @endforeach

    </div>

</nav>