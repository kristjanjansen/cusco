<div class="Box {{ $is }}">

    <div class="Box__title">

        {{ $title }}

    </div>

    <div class="Box__content">

        @foreach ($content as $content_item)
    
            <div class="margin-bottom-md">

            {!! $content_item !!}
            
            </div>

        @endforeach

    </div>

</div>