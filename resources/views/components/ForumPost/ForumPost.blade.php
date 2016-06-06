<div class="ForumPost {{ $is }}">

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

    </div>

</div>