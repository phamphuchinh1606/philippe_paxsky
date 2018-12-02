<div class="form-group">
    <label class="col-form-label">{{$labelInput}}</label>
    <div class="input-group">
        <span class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-phone"></i>
            </span>
        </span>
        <input class="form-control phone" name="{{$inputName}}" id="{{$inputName}}" type="text" placeholder="{{$placeHolder}}"
               value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}">
    </div>
</div>
