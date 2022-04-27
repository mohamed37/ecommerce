
@isset($customer)
  @foreach($customer as $key => $value)
    <option value="{{ $value->id }}" >{{ $value->name }}</option>

  @endforeach
@endisset


