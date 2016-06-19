<div
    class="Footer {{ $isclasses }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.65),
            rgba(0, 0, 0, 0.65)
        ),
    url({{ $image }});"
>    
    <div class="container">

        <div class="Footer__wrapper">
    
            <div class="Footer__col">
                
                <div class="Footer__link">Trip.ee</div>

            </div>

            @foreach(['col1', 'col2', 'col3'] as $col)

            <div class="Footer__col">

                @foreach($links[$col] as $link)
                
                <div class="Footer__link">{{ $link }}</div>

                @endforeach

            </div>

             @endforeach

        </div>

        </div>

    </div>

</div>
