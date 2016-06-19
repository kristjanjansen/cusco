<div class="ForumPost {{ $isclasses }}">

    <div class="ForumPost__left">

        {!! $user !!}

    </div>

    <div class="ForumPost__right">

    @if ($title)

        <div class="ForumPost__title">

            {{ $title }}

        </div>

    @endif

        <div class="ForumPost__meta">

            {!! $meta !!}

        </div>

        <div class="ForumPost__body">

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