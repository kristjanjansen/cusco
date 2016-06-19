<div class="Box {{ $isclasses }}">

    <div class="Box__title">

        {{ $title }}

    </div>

    <div class="Box__content">

        @foreach ($content->withoutLast() as $content_item)
    
            <div class="margin-bottom-md">

            {!! $content_item !!}
            
            </div>

        @endforeach

        <div>

            {!! $content->last() !!}
            
        </div>

    </div>

</div>