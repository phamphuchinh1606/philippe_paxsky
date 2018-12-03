<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <strong>{{$headTitle}}</strong>
        <div class="card-header-actions">
            <a class="btn btn-block btn-outline-secondary active" href="{{route('customer.index')}}">
                Back
            </a>
        </div>
    </div>
    <form class="form-horizontal" action="{{$actionUrl}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_text',[
                        'labelInput' => 'First Name',
                        'inputName' => 'first_name',
                        'placeHolder' => 'First name',
                        'required' => true,
                        'inputValue' => $customer->first_name
                    ])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_text',[
                       'labelInput' => 'Last Name',
                       'inputName' => 'last_name',
                       'placeHolder' => 'Last name',
                       'required' => true,
                       'inputValue' => $customer->last_name
                   ])
                </div>
            </div>
            @if(!isset($user->id))
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        @include('common.tagHtml.__input_password',[
                            'labelInput' => 'Password',
                            'inputName' => 'password',
                            'placeHolder' => 'Password',
                            'required' => true,
                            'inputValue' => $customer->password
                        ])
                    </div>
                    <div class="col-xl-6 col-md-12">
                        @include('common.tagHtml.__input_password',[
                           'labelInput' => 'Confirm Password',
                           'inputName' => 'confirm_password',
                           'placeHolder' => 'Confirm password',
                           'required' => true,
                           'inputValue' => ''
                       ])
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_date',[
                           'labelInput' => 'Birthday',
                           'inputName' => 'birthday',
                           'placeHolder' => 'Birthday',
                           'required' => true,
                           'inputValue' => $customer->birthday
                       ])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__check_form_radio',[
                        'labelInput' => 'Gender',
                        'inputName' => 'gender',
                        'dataCheck' => [
                            [
                                'value' => 'male',
                                'name' => 'Male'
                            ],
                            [
                                'value' => 'female',
                                'name' => 'Female'
                            ]
                        ]
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_text',[
                        'labelInput' => 'Email',
                        'inputName' => 'email',
                        'placeHolder' => 'Email',
                        'typeInput' => 'email',
                        'required' => true,
                        'inputValue' => $customer->email
                    ])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_phone',[
                        'labelInput' => 'Phone Number',
                        'inputName' => 'mobile_phone',
                        'placeHolder' => 'Phone number',
                        'required' => true,
                        'inputValue' => $customer->mobile_phone
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <label class="col-form-label" for="user_type_id">Group Customer</label>
                    @include('common.__select_group_customer',['selectName' => 'group_id','defaultValue' => $customer->group_id])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__check_box_on_of',[
                        'labelInput' => 'Is Active',
                        'inputName' => 'is_active',
                        'inputValue' => $customer->user->is_active
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <label class="col-form-label" for="province_id">Province</label>
                        @include('common.address.__select_province',['selectName' => 'province_id', 'defaultValue' => AppCommon::showValueOld('province_id',$customer->province_id),
                                'changeProvince' => true])
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <label class="col-form-label" for="district_id">District</label>
                        @include('common.address.__select_district',['selectName' => 'district_id', 'defaultValue' => AppCommon::showValueOld('district_id',$customer->district_id)])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <label class="col-form-label" for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="4" placeholder="Note">{{$customer->user->note}}</textarea>
                </div>
            </div>
            <div class="d-none">
                <input type="file" class="'form-control" id="profile_image" name="profile_image"/>
            </div>
        </div>
        <div class="card-footer  text-right">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> {{$saveButtonName}}</button>
            <a class="btn btn-danger" href="{{route('user.index')}}">
                <i class="fa fa-ban"></i> Cancel</a>
        </div>
    </form>
</div>
