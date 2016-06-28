<div class="Comment {{ $isclasses }}">

    <div class="Comment__left">

        {!! $user !!}

    </div>

    <div class="Comment__right">

        <div class="Comment__meta">

            {!! $meta !!}

        </div>

        <div class="Comment__body">

            {!! $body !!}

        </div>

    @if ($tags)

        <div class="margin-top-md">

            {!! $tags !!}

        </div>

    @endif

    @if ($flags)

        <div class="margin-top-md">

            {!! $flags !!}

        </div>

    @endif

    </div>

</div>