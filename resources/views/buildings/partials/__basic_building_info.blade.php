<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> Basic Information
        <div class="card-header-actions">
            <a class="btn btn-sm btn-secondary" href="{{route('building.index')}}">
                Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="name">Building Name</label>
                    <input class="form-control" id="name" type="text"
                           name="name" placeholder="Building Name" value="{{AppCommon::showValueOld('name',$building->name)}}">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="sub_name">Building
                        Title</label>
                    <input class="form-control" id="sub_name" type="text"
                           name="sub_name" placeholder="Building Title" value="{{AppCommon::showValueOld('sub_name',$building->sub_name)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="classify">Classify</label>
                    @include('common.__select_classification',['selectName' => 'classify_id', 'defaultValue' => AppCommon::showValueOld('classify_id',$building->classify_id)])
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="building_status">Is Public</label>
                    <div>
                        <label class="switch switch-label switch-outline-primary-alt">
                            <input class="switch-input" type="checkbox" @if($building->is_public == \App\Common\Constant::$PUBLIC_FLG_ON) checked @endif name="is_public">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="investor">Investor</label>
                    @include('common.__select_investor',['selectName' => 'investor_id', 'defaultValue' => AppCommon::showValueOld('investor_id',$building->investor_id)])
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="management_agency">Management Agency</label>
                    @include('common.__select_management_agency',['selectName' => 'management_agency_id', 'defaultValue' => AppCommon::showValueOld('management_agency_id',$building->management_agency_id)])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="basement_number">Basement Number</label>
                <input class="form-control text-right" id="basement_number"
                       type="number" step="1" name="basement_number"
                       placeholder="Basement number" value="{{AppCommon::showValueOld('basement_number',$building->basement_number)}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="ground_floor_number">Ground Floor Number</label>
                <input class="form-control text-right" id="ground_floor_number"
                       type="number" step="1" name="ground_floor_number"
                       placeholder="Ground floor number" value="{{AppCommon::showValueOld('ground_floor_number',$building->ground_floor_number)}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="floor_number">Floor Number</label>
                <input class="form-control text-right" id="floor_number" type="number"
                       step="1" name="floor_number"
                       placeholder="Floor number" value="{{AppCommon::showValueOld('floor_number',$building->floor_number)}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="rooftop_floor_number">Rooftop Floor Number</label>
                <input class="form-control text-right" id="rooftop_floor_number" type="number"
                       step="1" name="rooftop_floor_number"
                       placeholder="Rooftop floor number" value="{{AppCommon::showValueOld('rooftop_floor_number',$building->rooftop_floor_number)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="acreage_total">Acreage Total</label>
                    <input class="form-control text-right" id="acreage_total" type="number" step="0.1"
                           name="acreage_total" placeholder="Acreage total" value="{{AppCommon::showValueOld('acreage_total',$building->acreage_total)}}">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="acreage_rent_total">Acreage Rent Total</label>
                    <input class="form-control text-right" id="acreage_rent_total" type="number" step="0.1"
                           name="acreage_rent_total" placeholder="Acreage rent total" value="{{AppCommon::showValueOld('acreage_rent_total',$building->acreage_rent_total)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="floor_area">Floor Area</label>
                    <input class="form-control text-right" id="floor_area" type="number" step="0.1"
                           name="floor_area" placeholder="Floor Area" value="{{AppCommon::showValueOld('floor_area',$building->floor_area)}}">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="length_width_floor">Length And Width Floor</label>
                    <input class="form-control" id="length_width_floor" type="text"
                           name="length_width_floor" placeholder="Length And Width Floor" value="{{AppCommon::showValueOld('length_width_floor',$building->length_width_floor)}}">
                </div>
            </div>
        </div>

        <div class="d-none">
            <input type="file" class="'form-control" id="building_main_image"
                   name="building_main_image" value="{{AppCommon::showValueOld('main_image',$building->main_image)}}"/>
            <div class="root_building_images">
                <input type="hidden" class="'form-control building_images"
                       name="building_images[]" value=""/>
            </div>
        </div>
    </div>
</div>
