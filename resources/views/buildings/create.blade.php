@extends('layouts.master')

@section('head.title','Create Building Type')

@section('head.css')
    <link href="{{asset('css/plugins/quill.snow.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/plugins/dropzone.css')}}">
    <link href="{{asset('css/dropzon_custom.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/plugins/quill.min.js')}}"></script>
    <script src="{{asset('js/plugins/text-editor.js')}}"></script>
    <script src="{{asset('js/plugins/dropzone.js')}}"></script>
    <script src="{{asset('js/dropzone-config.js')}}"></script>
    <script src="{{asset('js/product.js')}}"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('buildingType.create') }}
@endsection
@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{route('building.create')}}" enctype="multipart/form-data"
                                  id="form">
                                @csrf
                                @include('buildings.partials.__basic_building_info')

                                @include('buildings.partials.__location_info')

                                @include('buildings.partials.__rental_cost_building_info')

                                @include('buildings.partials.__content_building_info')

                            </form>
                        </div>
                        <div class="col-md-4">
                            @include('buildings.partials.__main_image_building_info')

                            @include('buildings.partials.__list_image_building_info')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-footer text-center">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-dot-circle-o"></i> Create
                                            </button>
                                            <button class="btn btn-danger" type="reset">
                                                <i class="fa fa-ban"></i> Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-dot-circle-o"></i> Create
                                    </button>
                                    <button class="btn btn-danger" type="reset">
                                        <i class="fa fa-ban"></i> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
