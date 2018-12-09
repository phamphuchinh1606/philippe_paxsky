<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> Company Info
        <div class="card-header-actions">
            <a class="btn btn-sm btn-secondary" href="{{route('contract.index')}}">
                Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                    'labelInput' => 'Contract Code',
                    'placeHolder' => 'Contract code',
                    'inputName' => 'contract_code',
                    'inputValue' => $contract->contract_code
                ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_date',[
                    'labelInput' => 'Contract Date',
                    'placeHolder' => 'Contract date',
                    'inputName' => 'contract_date',
                    'inputValue' => $contract->contract_date
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                @include('common.tagHtml.__input_text',[
                    'labelInput' => 'Company Name',
                    'placeHolder' => 'Company name',
                    'inputName' => 'company_name',
                    'inputValue' => $contract->company_name
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                   'labelInput' => 'Tax Code',
                   'placeHolder' => 'Tax code',
                   'inputName' => 'tax_code',
                   'inputValue' => $contract->tax_code
               ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                   'labelInput' => 'Fax',
                   'placeHolder' => 'Fax',
                   'inputName' => 'fax',
                   'inputValue' => $contract->fax
               ])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                   'labelInput' => 'Bank Account Number',
                   'placeHolder' => 'Bank account number',
                   'inputName' => 'bank_account_number',
                   'inputValue' => $contract->bank_account_number
               ])
            </div>
            <div class="col-xl-6 col-md-12">
                @include('common.tagHtml.__input_text',[
                   'labelInput' => 'Bank Account Name',
                   'placeHolder' => 'Bank account name',
                   'inputName' => 'bank_account_name',
                   'inputValue' => $contract->bank_account_name
               ])
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
