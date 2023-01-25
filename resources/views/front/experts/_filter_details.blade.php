@foreach ($centerabouts as $item)
<label class="input-wrap">
    <input type="checkbox" name="center_id[]" value="{{ $item->id }}" class="experts__input__form">
    <span class="checkmark"></span>
    <h5 class="experts__title__h5">{{ $item->{'title_' . app()->getLocale()} }}</h5>
</label>
@endforeach