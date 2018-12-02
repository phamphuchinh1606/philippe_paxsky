<select class="form-control" name="{{$selectName}}">
    @foreach($groupCustomers as $group)
        <option value="{{$group->id}}" @if(isset($defaultValue) && $defaultValue == $group->id) selected @endif>
            {{$group->group_name}}
        </option>
    @endforeach
</select>
