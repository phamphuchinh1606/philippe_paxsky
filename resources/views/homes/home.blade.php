@extends('layouts.master')

@section('head.title','Home')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <style>
        .brand-card-body{
            padding: 0;
        }
        .brand-card-body .col-lg-4{
            text-align: right;
        }
        @media (max-width: 767px) {
            .brand-card-body .col-lg-4, .brand-card-body .col-lg-8{
                text-align: center!important;
            }
        }
    </style>
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
                                                <div class="font-weight-bold">
                                                    {{\App\Common\AppCommon::showTextDot($building->sub_name,50)}}
                                                </div>
                                            </div>
                                            <div class="brand-card-body">
                                                <div>
                                                    <div class="row font-weight-bold">
                                                        <div class="col-sm-6 col-lg-4">
                                                            Địa chỉ :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            {{$building->address}},
                                                            {{$building->district->label}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-4">
                                                            Xếp loại :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            {{$building->classify->name}}
                                                        </div>
                                                    </div>
                                                    <div class="row font-weight-bold">
                                                        <div class="col-sm-6 col-lg-4">
                                                           Giá thuê :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            {{\App\Common\NumberUtils::formatDouble($building->rental_cost + $building->manager_cost + $building->tax_cost)}}
                                                            {{\App\Common\Constant::$UNIT_RENT_COST}}
                                                            ( Phí quản lý . Vat)
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-4">
                                                            Phí điện :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            {{\App\Common\NumberUtils::formatDouble($building->electricity_cost)}}
                                                            {{\App\Common\Constant::$UNIT_ELECTRIC_COST}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-4">
                                                            Kết cấu tòa nhà :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            {{$building->structure_str}}
                                                        </div>
                                                    </div>
                                                    <div class="row font-weight-bold">
                                                        <div class="col-sm-6 col-lg-4">
                                                            Diện tích thuê :
                                                        </div>
                                                        <div class="col-sm-6 col-lg-8 text-left">
                                                            @if($building->acreage_rent_list != '')
                                                                {{$building->acreage_rent_list}}
                                                                {{\App\Common\Constant::$UNIT_ACREAGE}}
                                                            @else
                                                                FULL
                                                            @endif

                                                        </div>
                                                    </div>
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
