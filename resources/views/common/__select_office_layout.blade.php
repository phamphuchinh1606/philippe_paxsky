<select class="form-control" name="{{$selectName}}">
    @foreach($officeLayouts as $officeLayout)
        <option value="{{$officeLayout->id}}" @if(isset($defaultValue) && $defaultValue == $officeLayout->id) selected @endif>
            {{$officeLayout->layout_name}}
        </option>
    @endforeach
</select>
