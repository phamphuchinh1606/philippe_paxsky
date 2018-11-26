<select class="form-control" id="select2-2" name="floor[]" @if(isset($multiple) && $multiple) multiple="multiple" @endif>
    <option data-select2-id="-1" value="-1" @if($defaultValue == -1) selected @endif >Ground Floor</option>
    <option data-select2-id="0" value="0" @if($defaultValue == 0) selected @endif>Mezzanine</option>
    @for($i = 1; $i <= 20 ; $i++)
        <option data-select2-id="{{$i}}" value="{{$i}}" @if($defaultValue == $i) selected @endif>Floor {{$i}}</option>
    @endfor
    <option data-select2-id="99">Rooftop</option>
</select>
