<select class="form-control" name="{{$selectName}}">
    @foreach($investors as $investor)
        <option value="{{$investor->id}}" @if(isset($defaultValue) && $defaultValue == $investor->id) selected @endif>
            {{$investor->name}}
        </option>
    @endforeach
</select>
