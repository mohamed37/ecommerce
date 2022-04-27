
@isset($subcat)
  @foreach($subcat as $key => $value)
    <option value="{{ $value->id }}" >{{ $value->name }}</option>
  @endforeach
@endisset
