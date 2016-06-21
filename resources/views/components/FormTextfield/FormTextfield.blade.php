<div class="FormTextfield {{ $isclasses }}">

    @if ($label)

        <label for="{{ $name }}" class="FormTextfield__label">{{ $label }}</label>
    
    @endif

    <input name="{{ $name }}" type="text" value="{{ $value }}" class="FormTextfield__title">

</div>