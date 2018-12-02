<div class="card">
    <div class="card-header">
        <strong>{{$headTitle}}</strong>
        <div class="card-header-actions">
            <a class="btn btn-block btn-outline-secondary active" href="{{route('user.index')}}">
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
                        'inputValue' => $user->first_name
                    ])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_text',[
                       'labelInput' => 'Last Name',
                       'inputName' => 'last_name',
                       'placeHolder' => 'Last name',
                       'required' => true,
                       'inputValue' => $user->last_name
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
                            'inputValue' => $user->password
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
                    @include('common.tagHtml.__input_text',[
                        'labelInput' => 'Email',
                        'inputName' => 'email',
                        'placeHolder' => 'Email',
                        'typeInput' => 'email',
                        'required' => true,
                        'inputValue' => $user->email
                    ])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__input_phone',[
                        'labelInput' => 'Phone Number',
                        'inputName' => 'mobile_phone',
                        'placeHolder' => 'Phone number',
                        'required' => true,
                        'inputValue' => $user->mobile_phone
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <label class="col-form-label" for="user_type_id">User Type</label>
                    @include('common.__select_user_type',['selectName' => 'user_type_id','defaultValue' => $user->user_type_id])
                </div>
                <div class="col-xl-6 col-md-12">
                    @include('common.tagHtml.__check_box_on_of',[
                        'labelInput' => 'Is Active',
                        'inputName' => 'is_active',
                        'inputValue' => $user->is_active
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <label class="col-form-label" for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="4" placeholder="Note">{{$user->note}}</textarea>
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
