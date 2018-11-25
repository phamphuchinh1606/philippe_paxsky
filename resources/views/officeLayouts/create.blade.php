@extends('layouts.master')

@section('head.title','Create Office Layout')

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
                            <form method="post" id="form-building" action="{{route('office_layout.create')}}" enctype="multipart/form-data"
                                  id="form">
                                @csrf
                                @include('officeLayouts.partials.__office_info')
                            </form>
                        </div>
                        <div class="col-md-4">
                            @include('officeLayouts.partials.__main_image')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
