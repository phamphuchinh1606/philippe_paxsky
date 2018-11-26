<select class="form-control" id="select2-2" name="states[]" multiple="multiple">
    <option data-select2-id="-1" value="-1">Ground Floor</option>
    <option data-select2-id="0" value="0">Mezzanine</option>
    @for($i = 1; $i <= 20 ; $i++)
        <option data-select2-id="{{$i}}" value="{{$i}}">Floor {{$i}}</option>
    @endfor
    <option data-select2-id="99">Rooftop</option>
</select>
