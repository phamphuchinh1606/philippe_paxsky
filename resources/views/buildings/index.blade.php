<?php use App\Common\ImageCommon; ?>
@extends('layouts.master')

@section('head.title','List Building')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/building.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('building') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List Building
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('building.create')}}">
                                    New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success clearfix">
                                    {{ \Session::get('success') }}
                                </div>
                            @endif
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th>
                                                    No.
                                                </th>
                                                <th class="text-center">
                                                    Image
                                                </th>
                                                <th class="text-center">
                                                    Building Name
                                                </th>
                                                <th class="text-center">
                                                    Direction Of Building
                                                </th>
                                                <th class="text-center">
                                                    Acreage Rent Total
                                                </th>
                                                <th class="text-center">
                                                    Leasing Rate
                                                </th>
                                                <th class="text-center">
                                                    Status
                                                </th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($buildings as $index => $building)
                                                <tr role="row" class="odd">
                                                    <td class="app-col-stt">
                                                        {{$index + 1}}
                                                    </td>
                                                    <td class="app-col-img">
                                                        <img src="{{ImageCommon::showImage($building->main_image)}}">
                                                    </td>
                                                    <td class="app-col-name">
                                                        {{$building->name}}
                                                    </td>
                                                    <td class="app-col-direction">
                                                        {{$building->direction->name}}
                                                    </td>
                                                    <td class="app-col-acreage_rent_total text-right">
                                                        {{\App\Common\AppCommon::formatDouble($building->acreage_rent_total)}}
                                                    </td>
                                                    <td class="app-col-rental-cost text-right">
                                                        {{\App\Common\AppCommon::formatDouble($building->rental_cost)}}
                                                    </td>
                                                    <td class="app-col-status text-center">
                                                        <span class="badge {{$building->public_class}}">{{$building->public_name}}</span>
                                                    </td>
                                                    <td class="text-center app-col-action">
                                                        <a class="btn btn-info" href="{{route('building.update',['id' => $building->id])}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                           data-url="{{route('building.delete',['id' => $building->id]) }}"
                                                           data-name="{{$building->name}}" href="#deleteModal">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
