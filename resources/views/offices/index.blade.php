<?php use App\Common\ImageCommon; ?>
@extends('layouts.master')

@section('head.title','List Office Layout')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/building.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('office') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> Office Layout
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('office.create')}}">
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
                                                    Office Name
                                                </th>
                                                <th class="text-center">
                                                    Building Name
                                                </th>
                                                <th class="text-center">
                                                    Floor
                                                </th>
                                                <th class="text-center">
                                                    Direction
                                                </th>
                                                <th class="text-center">
                                                    Acreage Total
                                                </th>
                                                <th class="text-center">
                                                    Acreage Rent
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($offices as $index => $office)
                                                <tr role="row" class="odd">
                                                    <td class="app-col-stt">
                                                        {{$index + 1}}
                                                    </td>
                                                    <td class="app-col-img">
                                                        <img src="{{ImageCommon::showImage($office->image_src)}}">
                                                    </td>
                                                    <td class="app-col-name">
                                                        {{$office->office_name}}
                                                    </td>
                                                    <td class="app-col-direction">
                                                        {{$office->building->name}}
                                                    </td>
                                                    <td class="app-col-name">
                                                        {{$office->floor_name}}
                                                    </td>
                                                    <td class="app-col-direction">
                                                        {{$office->direction->name}}
                                                    </td>
                                                    <td class="app-col-acreage_rent_total text-right">
                                                        {{\App\Common\AppCommon::formatDouble($office->acreage_total)}}
                                                    </td>
                                                    <td class="app-col-rental-cost text-right">
                                                        {{\App\Common\AppCommon::formatDouble($office->acreage_rent)}}
                                                    </td>
                                                    <td>
                                                        {{$office->status->status_name}}
                                                    </td>
                                                    <td class="text-center app-col-action">
                                                        <a class="btn btn-info" href="{{route('office.update',['id' => $office->id])}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                           data-url="{{route('office.delete',['id' => $office->id]) }}"
                                                           data-name="{{$office->office_name}}" href="#deleteModal">
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
