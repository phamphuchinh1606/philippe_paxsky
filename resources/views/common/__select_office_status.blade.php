<select class="form-control" name="{{$selectName}}">
    @foreach($officeStatuses as $officeStatus)
        <option value="{{$officeStatus->id}}" @if(isset($defaultValue) && $defaultValue == $officeStatus->id) selected @endif>
            {{$officeStatus->name}}
        </option>
    @endforeach
</select>
