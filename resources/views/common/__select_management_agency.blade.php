<select class="form-control" name="{{$selectName}}">
    @foreach($managementAgencies as $managementAgency)
        <option value="{{$managementAgency->id}}" @if(isset($defaultValue) && $defaultValue == $managementAgency->id) selected @endif>
            {{$managementAgency->name}}
        </option>
    @endforeach
</select>
