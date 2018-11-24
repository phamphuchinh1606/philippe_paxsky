<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> Basic Information
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="building_status">Building Status</label>
                    <input class="form-control" id="building_status" type="text"
                           name="building_status" placeholder="building_status">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="building_status">Is Public</label>
                    <div>
                        <label class="switch switch-label switch-outline-primary-alt">
                            <input class="switch-input" type="checkbox" checked=""
                                   name="is_public">
                            <span class="switch-slider" data-checked="On"
                                  data-unchecked="Off"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="name">Building
                        Name</label>
                    <input class="form-control" id="name" type="text"
                           name="name" placeholder="Building Name">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="sub_name">Building
                        Title</label>
                    <input class="form-control" id="sub_name" type="text"
                           name="sub_name" placeholder="Building Title">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="building_type">Building Type</label>
                    @include('common.__select_building_type',['selectName' => 'type_id'])
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="classify">Classify</label>
                    @include('common.__select_classification',['selectName' => 'classify_id'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="investor">Investor</label>
                    @include('common.__select_investor',['selectName' => 'investor_id'])
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="management_agency">Management Agency</label>
                    @include('common.__select_management_agency',['selectName' => 'management_agency_id'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="basement_number">Basement Number</label>
                <input class="form-control text-right" id="basement_number"
                       type="number" value="0" step="1" name="basement_number"
                       placeholder="Basement number">
            </div>
            <div class="form-group col-sm-3">
                <label for="ground_floor_number">Ground Floor Number</label>
                <input class="form-control text-right" id="ground_floor_number"
                       type="number" value="0" step="1" name="ground_floor_number"
                       placeholder="Ground floor number">
            </div>
            <div class="form-group col-sm-3">
                <label for="floor_number">Floor Number</label>
                <input class="form-control text-right" id="floor_number" type="number"
                       value="0" step="1" name="floor_number"
                       placeholder="Floor number">
            </div>
            <div class="form-group col-sm-3">
                <label for="rooftop_number">Rooftop Number</label>
                <input class="form-control text-right" id="rooftop_number" type="number"
                       value="0" step="1" name="rooftop_number"
                       placeholder="Rooftop number">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="acreage_total">Acreage Total</label>
                    <input class="form-control" id="acreage_total" type="text"
                           name="acreage_total" placeholder="Acreage total">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="acreage_rent_total">Acreage Rent Total</label>
                    <input class="form-control" id="acreage_rent_total" type="text"
                           name="acreage_rent_total" placeholder="Acreage rent total">
                </div>
            </div>
        </div>

        <div class="d-none">
            <input type="file" class="'form-control" id="building_main_image"
                   name="building_main_image"/>
            <div class="root_building_images">
                <input type="hidden" class="'form-control building_images"
                       name="building_images[]" value=""/>
            </div>
        </div>
    </div>
</div>
