<select class="form-control" name="{{$selectName}}">
    @foreach($buildingTypes as $buildingType)
        <option value="{{$buildingType->id}}" @if(isset($defaultValue) && $defaultValue == $buildingType->id) selected @endif>
            {{$buildingType->name}}
        </option>
    @endforeach
</select>
