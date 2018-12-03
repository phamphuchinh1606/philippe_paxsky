<select class="form-control district_control" name="{{$selectName}}">
    @foreach($districts as $district)
        <option value="{{$district->id}}" @if(isset($defaultValue) && $defaultValue == $district->id) selected @endif>
            {{$district->label}}
        </option>
    @endforeach
</select>
