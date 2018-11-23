<select class="form-control" name="{{$selectName}}">
    @foreach($classifies as $classify)
        <option value="{{$classify->id}}" @if(isset($defaultValue) && $defaultValue == $classify->id) selected @endif>
            {{$classify->name}}
        </option>
    @endforeach
</select>
