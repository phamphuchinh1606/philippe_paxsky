<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> Rental Information
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Amount',
                    'placeHolder' => 'Amount',
                    'inputName' => 'amount',
                    'inputValue' => $contract->amount
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Tax Amount',
                    'placeHolder' => 'Tax amount',
                    'inputName' => 'tax_amount',
                    'inputValue' => $contract->tax_amount
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Discount Amount',
                    'placeHolder' => 'Discount amount',
                    'inputName' => 'discount_amount',
                    'inputValue' => $contract->discount_amount
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                    'labelInput' => 'Total Amount',
                    'placeHolder' => 'Total amount',
                    'inputName' => 'total_amount',
                    'inputValue' => $contract->total_amount
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_date',[
                   'labelInput' => 'Start Date',
                   'placeHolder' => 'Start date',
                   'inputName' => 'start_date',
                   'inputValue' => $contract->start_date
               ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_date',[
                   'labelInput' => 'End Date',
                   'placeHolder' => 'End date',
                   'inputName' => 'end_date',
                   'inputValue' => $contract->end_date
               ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="direction">Building</label>
                    @include('common.__select_building',['selectName' => 'building_id','defaultValue' => AppCommon::showValueOld('building_id',$contract->building_id)])
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_double',[
                   'labelInput' => 'Total Rent Acreage',
                   'placeHolder' => 'Total rent acreage',
                   'inputName' => 'total_rent_acreage',
                   'inputValue' => $contract->total_rent_acreage
               ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">

            </div>
            <div class="col-xl-6 col-md-12">

            </div>
        </div>


        {{--<div class="d-none">--}}
        {{--<input type="file" class="'form-control" id="building_main_image"--}}
        {{--name="building_main_image" value="{{AppCommon::showValueOld('main_image',$building->main_image)}}"/>--}}
        {{--<div class="root_building_images">--}}
        {{--<input type="hidden" class="'form-control building_images"--}}
        {{--name="building_images[]" value=""/>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
