<div class="form-group">
    <label class="col-form-label" for="{{$inputName}}">{{$labelInput}}</label>
    <input class="form-control" id="{{$inputName}}" type="text"
           name="{{$inputName}}" placeholder="{{$placeHolder}}" value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}">
</div>
