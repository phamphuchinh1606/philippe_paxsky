<div class="form-group">
    <label class="col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
    <input class="form-control" id="{{$inputName}}" type="@if(isset($typeInput)) {{$typeInput}} @else text @endif"
           name="{{$inputName}}" placeholder="{{$placeHolder}}" value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}"
            @if(isset($required) && $required) required @endif>
</div>
