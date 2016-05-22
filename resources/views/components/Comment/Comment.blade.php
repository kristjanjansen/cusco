<div class="Comment {{ $modifiers }}">
    
    <div class="Comment__left">

        {!! $left !!}

    </div>

    <div class="Comment__right">

        <div class="Comment__title">

            {!! $title !!}

        </div>

        <div class="Comment__body">

            @component('Body', ['body' => $body])
            
        </div>

    </div>

</div>