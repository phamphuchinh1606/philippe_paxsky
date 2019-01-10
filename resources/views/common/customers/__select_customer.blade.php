<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @foreach($customers as $customer)
        <option value="{{$customer->id}}" @if(isset($defaultValue) && $defaultValue == $customer->id) selected @endif>
            {{$customer->fullName}}
        </option>
    @endforeach
</select>
