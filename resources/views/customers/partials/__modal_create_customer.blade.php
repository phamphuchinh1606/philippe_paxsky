<?php use App\Common\Constant; use App\Common\AppCommon; ?>
<style>
    #appointmentModal .modal-footer .btn-delete{
        justify-content: flex-start;
        margin-right: 72%;
    }
</style>
<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <form class="inline" action="{{route('customer.create')}}" method="post" id="formCustomer">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Visit Customer</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    @if(!isset($customer->id))
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
                                   'inputValue' => $customer->birthday_str
                               ])
                        </div>
                        <div class="col-xl-6 col-md-12">
                            @include('common.tagHtml.__check_form_radio',[
                                'labelInput' => 'Gender',
                                'inputName' => 'gender',
                                'defaultValue' => $customer->gender,
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
                                        'changeProvince' => true, 'defaultValue' => $customer->province_id])
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
                </div>
                <div class="modal-footer">
                    {{--<button class="btn btn-danger btn-delete" type="button">Delete</button>--}}
                    <button class="btn btn-secondary name-cancel pull-right" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary btn-save-customer" type="button" formnovalidate>
                        <span class="ladda-label">Save</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    let urlCreateCustomer = "{{route('customer.create_ajax')}}";
    $(document).ready(function(){
        $('.btn-save-customer').on('click',function(){
            let firstName = $('input[name=first_name]').val();
            let lastName = $('input[name=last_name]').val();
            let password = $('input[name=password]').val();
            let confirmPassword = $('input[name=confirm_password]').val();
            let birthday = $('input[name=birthday]').val();
            let email = $('input[name=email]').val();
            let mobilePhone = $('input[name=mobile_phone]').val();
            let groupId = $('select[name=group_id]').val();
            let provinceId = $('select[name=province_id]').val();
            let districtId = $('select[name=district_id]').val();
            let note = $('input[name=note]').val();
            let gender = $('input[name=gender]:checked').val();
            let isActive = $('input[name=is_active]').prop("checked") ? 'On' : 'Off';

            let url = urlCreateCustomer;
            let data = {first_name : firstName, last_name : lastName, password : password, confirm_password : confirmPassword, birthday : birthday, email: email,
                mobile_phone : mobilePhone, group_id : groupId , province_id : provinceId, district_id : districtId, note : note, gender : gender, is_active : isActive};

            var params = {
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json',
                success: function(data) {
                    let full_name = data.first_name + ' ' + data.last_name;
                    let phone_number = data.mobile_phone;
                    let email = data.email;
                    let customerId = data.id;
                    $("#createCustomerModal").modal('toggle');
                    return returnSelectCustomer(full_name, phone_number, email, customerId);
                }
            };
            jQuery.ajax(params);
        });
    });
</script>
