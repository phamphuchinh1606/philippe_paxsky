@extends('layouts.master')

@section('head.title','Update User')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('customer.update',$customer->first_name.' '.$customer->last_name) }}
@endsection
@section('body.js')
    <script src="{{asset('js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('js/advanced-forms.js') }}" type='text/javascript'></script>
@endsection

@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-8">
                        @include('customers.partials.__customer_info',['headTitle' => 'Update Customer',
                            'saveButtonName' => 'Update',
                            'actionUrl' => route('customer.update',['id' => $customer->id])])
                    </div>

                    <div class="col-md-4">
                        @include('customers.partials.__customer_profile_image')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
