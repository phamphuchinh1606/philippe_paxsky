<div class="form-group">
    <label class="col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
    <div class="controls">
        <div class="input-prepend input-group">
            <input class="form-control text-right" id="{{$inputName}}" name="{{$inputName}}" size="16" type="number" step="0.1"
                   value="{{\App\Common\AppCommon::showValueOld($inputName,$inputValue)}}" min="0">
            @if(isset($unit))
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$unit}}</span>
                </div>
            @endif
        </div>
    </div>
</div>
