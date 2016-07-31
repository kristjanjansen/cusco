<div class="Block {{ $isclasses }}">

    <div class="Block__title">

        {{ $title }}

    </div>

    <div class="Block__content">

        @foreach ($content->withoutLast() as $content_item)
    
            <div class="margin-bottom-sm">

            {!! $content_item !!}
            
            </div>

        @endforeach

        <div>

            {!! $content->last() !!}
            
        </div>

    </div>

</div>