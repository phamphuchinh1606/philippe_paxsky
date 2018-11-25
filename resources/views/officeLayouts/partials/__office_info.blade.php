<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> Create Office Layout
        <div class="card-header-actions">
            <a class="btn btn-sm btn-secondary" href="{{route('office_layout.index')}}">
                Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                    'labelInput' => 'Office Name',
                    'placeHolder' => 'Office name',
                    'inputName' => 'layout_name',
                    'inputValue' => $officeLayout->layout_name
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="direction">Building</label>
                    @include('common.__select_building',['selectName' => 'building_id','defaultValue' => AppCommon::showValueOld('building_id',$officeLayout->building_id),
                        'selectTop' => true])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Acreage Total',
                    'placeHolder' => 'Acreage total',
                    'inputName' => 'acreage_total',
                    'inputValue' => $officeLayout->acreage_total
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Acreage Rent',
                    'placeHolder' => 'Acreage rent',
                    'inputName' => 'acreage_rent',
                    'inputValue' => $officeLayout->acreage_rent
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Length Floor',
                    'placeHolder' => 'Length floor',
                    'inputName' => 'length_floor',
                    'inputValue' => $officeLayout->length_floor
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Width floor',
                    'placeHolder' => 'Width floor',
                    'inputName' => 'width_floor',
                    'inputValue' => $officeLayout->width_floor
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                @include('common.tagHtml.__input_text',[
                    'labelInput' => 'Structure',
                    'placeHolder' => 'Structure',
                    'inputName' => 'structure',
                    'inputValue' => $officeLayout->structure
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Door Number',
                    'placeHolder' => 'Door number',
                    'inputName' => 'door_number',
                    'inputValue' => $officeLayout->door_number
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="direction">Direction</label>
                    @include('common.__select_direction',['selectName' => 'direction_id', 'defaultValue' => AppCommon::showValueOld('direction_id',$officeLayout->direction_id)])
                </div>
            </div>
        </div>

        <div class="d-none">
            <input type="file" class="'form-control" id="image_src"
                   name="image_src" value="{{AppCommon::showValueOld('image_src',$officeLayout->image_src)}}"/>
            <div class="root_building_images">
                <input type="hidden" class="'form-control building_images"
                       name="building_images[]" value=""/>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-primary submit-building" type="button">
            <i class="fa fa-dot-circle-o"></i> Create
        </button>
        <button class="btn btn-danger" type="reset">
            <i class="fa fa-ban"></i> Cancel</button>
    </div>
</div>
