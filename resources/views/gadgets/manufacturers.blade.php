@isset($manufacturers)
@foreach($manufacturers as $manufacturer)
<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturer }}</option>
@endforeach
@endisset