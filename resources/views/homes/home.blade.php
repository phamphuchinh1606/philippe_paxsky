@extends('layouts.master')

@section('head.title','Home')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List Building Of Paxsky
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($buildings as $building)
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="brand-card">
                                            <div class="">
                                                <img src="{{\App\Common\ImageCommon::showImage($building->main_image)}}" style="width: 100%;height: auto;max-height: 450px"/>
                                            </div>
                                            <div class="brand-card-body">
                                                <div>
                                                    {{\App\Common\AppCommon::showTextDot($building->sub_name,50)}}
                                                </div>
                                            </div>
                                            <div class="brand-card-body">
                                                <div>
                                                    <div>District {{$building->district_id}}</div>
                                                </div>
                                                <div>
                                                    <div>{{$building->rental_cost}} $/ m2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
