<div class="FormTextarea {{ $isclasses }}">

    @if ($label)

        <label for="{{ $name }}" class="FormTextarea__label">{{ $label }}</label>
    
    @endif

    <textarea
        id={{ $name }}
        name="{{ $name }}"
        rows="8"
        cols="50"
        class="FormTextarea__textarea"
    >{{ $value }}</textarea>

</div>