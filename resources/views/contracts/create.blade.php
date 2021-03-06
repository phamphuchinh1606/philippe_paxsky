@extends('layouts.master')

@section('head.title','Create Contract')

@section('head.css')
    <link href="{{asset('css/plugins/select2.min.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/plugins/quill.min.js')}}"></script>
    <script src="{{asset('js/plugins/text-editor.js')}}"></script>
    <script src="{{asset('js/advanced-forms.js')}}"></script>
    <script src="{{asset('js/contract.js')}}"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('contract.create') }}
@endsection
@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <form method="post" id="form-building" action="{{route('contract.create')}}" enctype="multipart/form-data"
                          id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                @include('contracts.partials.__contract_info')
                            </div>
                            <div class="col-md-6">
                                @include('contracts.partials.__rental_information')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                @include('contracts.partials.__contract_representative')
                            </div>
                            <div class="col-md-6">
                                @include('contracts.partials.__rental_office')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-footer text-center">
                                        <button class="btn btn-primary submit-building" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Create
                                        </button>
                                        <button class="btn btn-danger" type="reset" onclick="window.location='{{route('contract.index')}}'">
                                            <i class="fa fa-ban"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @include('customers.partials.__modal_create_customer')
    @include('customers.partials.__modal_search_customer')
    @include('offices.partials.__modal_search_office')
@endsection
