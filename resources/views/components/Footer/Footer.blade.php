<div
    class="Footer {{ $isclasses }}"
    style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)
        ),
    url({{ $image }});"
>    
    <div class="container">

        <div class="Footer__wrapper">
    
            <div class="Footer__col">
                
                {!! $logo !!}

            </div>

            @foreach(['col1', 'col2', 'col3'] as $col)

            <div class="Footer__col">

                @foreach($links[$col] as $link)
                
                <div class="Footer__link"><a href="{{ $link->route }}">{{ $link->title }}</div>

                @endforeach

            </div>

             @endforeach

        </div>

        <div class="Footer__social">

            @foreach($links['social'] as $link)
            
            <div class="Footer__socialLink">{{ $link }}</div>

            @endforeach
        
        </div>

        <div class="Footer__licence">

            {!! $licence !!}
        
        </div>

    </div>

</div>
