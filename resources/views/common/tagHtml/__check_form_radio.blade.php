<div class="form-group">
    <label class="col-form-label">{{$labelInput}}</label>
    <div class="form-group">
        @foreach($dataCheck as $index => $data)
            <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" id="inline-radio-{{$index}}" type="radio" value="{{$data['value']}}" name="{{$inputName}}"
                    @if(isset($defaultValue) && $defaultValue == $data['value']) checked @endif>
                <label class="form-check-label" for="inline-radio-{{$index}}">{{$data['name']}}</label>
            </div>
        @endforeach
    </div>
</div>
