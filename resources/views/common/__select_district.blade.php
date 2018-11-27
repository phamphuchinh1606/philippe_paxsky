<select class="form-control" name="{{$selectName}}">
    @foreach($districts as $district)
        <option value="{{$district->id}}" @if(isset($defaultValue) && $defaultValue == $district->id) selected @endif>
            {{$district->label}}
        </option>
    @endforeach
</select>
