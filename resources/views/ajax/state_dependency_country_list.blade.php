@foreach($state as $key => $stateValue)
    <option value="{{ $stateValue->id }}"  {{ $selected == $stateValue->id ? 'selected' : '' }} state_id ="{{ $stateValue->id }}">{{ $stateValue->name }}</option>
@endforeach
