@extends('layouts.master')

@section('head.title','Create User')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('user.create') }}
@endsection
@section('body.js')
    <script src="{{asset('js/advanced-forms.js') }}" type='text/javascript'></script>
@endsection

@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-8">
                        @include('users.partials.__user_info',[
                            'headTitle' => 'Create User',
                            'saveButtonName' => 'Save',
                            'actionUrl' => route('user.create')])
                    </div>

                    <div class="col-md-4">
                        @include('users.partials.__user_profile_image')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
