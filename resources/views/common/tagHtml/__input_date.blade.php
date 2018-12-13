@if(isset($showHorizontal))
    <div class="form-group row">
        <label class="col-md-2 col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
        <div class="col-md-10">
            <input class="form-control" id="{{$inputName}}" type="date" name="{{$inputName}}" placeholder="{{$placeHolder}}"
                   value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}"
                   @if(isset($required) && $required) required @endif>
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
        <input class="form-control" id="{{$inputName}}" type="date" name="{{$inputName}}" placeholder="{{$placeHolder}}"
               value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}"
               @if(isset($required) && $required) required @endif>
    </div>
@endif

