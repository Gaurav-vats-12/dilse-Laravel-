@foreach($state as $key => $stateValue)
    <option value="{{ $stateValue->name }}"  {{ $selected == $stateValue->name ? 'selected' : '' }} state_id ="{{ $stateValue->id }}">{{ $stateValue->name }}</option>
@endforeach
