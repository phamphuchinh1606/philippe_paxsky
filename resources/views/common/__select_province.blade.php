<select class="form-control" name="{{$selectName}}">
    @foreach($provinces as $province)
        <option value="{{$province->id}}" @if(isset($defaultValue) && $defaultValue == $province->id) selected @endif>
            {{$province->label}}
        </option>
    @endforeach
</select>
