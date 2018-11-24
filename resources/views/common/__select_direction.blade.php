<select class="form-control" name="{{$selectName}}">
    @foreach($directions as $direction)
        <option value="{{$direction->id}}" @if(isset($defaultValue) && $defaultValue == $direction->id) selected @endif>
            {{$direction->name}}
        </option>
    @endforeach
</select>
