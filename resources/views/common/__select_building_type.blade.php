<select class="form-control" name="{{$selectName}}">
    @foreach($buildingTypes as $buildingType)
        <option value="{{$buildingType->id}}" @if(isset($defaultValue) && $defaultValue == $buildingType->id) selected @endif>
            {{$buildingType->type_name}}
        </option>
    @endforeach
</select>
