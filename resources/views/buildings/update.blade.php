@extends('layouts.master')

@section('head.title','Update Building')

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
    {{ Breadcrumbs::render('building.update', $building->name) }}
@endsection
@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" id="form-building" action="{{route('building.update',['id' => $building->id])}}" enctype="multipart/form-data"
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
                                            <a data-toggle="modal" class="anchorClick"
                                                data-url="{{route('building.delete',['id' => $building->id])}}"
                                                data-name="{{$building->name}}" href="#deleteModal">
                                                <button class="btn btn-danger" type="button">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            </a>
                                            <button class="btn btn-secondary" type="reset" onclick="window.location='{{route('building.index')}}'">
                                                <i class="fa fa-ban"></i> Cancel</button>

                                            <button class="btn btn-primary submit-building" type="button">
                                                <i class="fa fa-dot-circle-o"></i> Update
                                            </button>

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
                                    <a data-toggle="modal" class="anchorClick"
                                       data-url="{{route('building.delete',['id' => $building->id])}}"
                                       data-name="{{$building->name}}" href="#deleteModal">
                                        <button class="btn btn-danger" type="button">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </button>
                                    </a>

                                    <button class="btn btn-secondary" type="reset" onclick="window.location='{{route('building.index')}}'">
                                        <i class="fa fa-ban"></i> Cancel</button>

                                    <button class="btn btn-primary submit-building" type="button">
                                        <i class="fa fa-dot-circle-o"></i> Update
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
