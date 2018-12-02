<select class="form-control" name="{{$selectName}}">
    @foreach($userTypes as $userType)
        <option value="{{$userType->id}}" @if(isset($defaultValue) && $defaultValue == $userType->id) selected @endif>
            {{$userType->type_name}}
        </option>
    @endforeach
</select>
