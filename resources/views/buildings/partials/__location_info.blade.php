<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <strong>Location Building</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="province_id">Province</label>
                    <input class="form-control" id="province_id" type="text"
                           name="province_id" placeholder="Province" value="{{AppCommon::showValueOld('province_id',$building->province_id)}}">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="district_id">District</label>
                    <input class="form-control" id="district_id" type="text"
                           name="district_id" placeholder="District" value="{{AppCommon::showValueOld('district_id',$building->district_id)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="address">Address</label>
                    <input class="form-control" id="address" type="text" name="address"
                           placeholder="Address" value="{{AppCommon::showValueOld('address',$building->address)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="direction">Direction</label>
                    @include('common.__select_direction',['selectName' => 'direction_id', 'defaultValue' => AppCommon::showValueOld('direction_id',$building->direction_id)])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="long">Long</label>
                    <input class="form-control text-right" id="long" type="text"
                           name="long" placeholder="Long" value="{{AppCommon::showValueOld('long',$building->long)}}">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="lat">Lat</label>
                    <input class="form-control text-right" id="lat" type="text"
                           name="lat" placeholder="Lat" value="{{AppCommon::showValueOld('lat',$building->lat)}}">
                </div>
            </div>
        </div>
    </div>
</div>
