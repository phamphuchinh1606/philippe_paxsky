<select class="form-control" name="{{$selectName}}">
    @foreach($userSales as $userSale)
        <option value="{{$userSale->id}}" @if(isset($defaultValue) && $defaultValue == $userSale->id) selected @endif>
            {{$userSale->first_name.' '.$userSale->last_name}}
        </option>
    @endforeach
</select>
