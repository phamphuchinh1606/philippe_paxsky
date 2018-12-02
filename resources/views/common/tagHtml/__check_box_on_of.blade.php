<div class="form-group">
    <label class="col-form-label" for="{{$inputName}}">{{$labelInput}}</label>
    <div>
        <label class="switch switch-label switch-outline-primary-alt">
            <input class="switch-input" type="checkbox" @if($inputValue == \App\Common\Constant::$PUBLIC_FLG_ON) checked @endif name="{{$inputName}}">
            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
        </label>
    </div>
</div>
