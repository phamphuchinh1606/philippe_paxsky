<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @if(isset($selectTop) &&  $selectTop)
        <option value="" disabled>Select building</option>
    @endif
    @foreach($buildings as $building)
        <option value="{{$building->id}}" @if(isset($defaultValue) && $defaultValue == $building->id) selected @endif>
            {{$building->name}}
        </option>
    @endforeach
</select>
