<div
    class="Footer {{ $isclasses }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.75),
            rgba(0, 0, 0, 0.75)
        ),
    url({{ $image }});"
>    
    <div class="container">
    
        <div class="row-center">

            @foreach(['col1', 'col2', 'col3', 'col4'] as $col)

            <div class="col-2">

                @foreach($links[$col] as $link)
                
                <div class="Footer__link">{{ $link }}</div>

                @endforeach

            </div>

            @endforeach

        </div>

    </div>

</div>
