@extends('layouts.master')

@section('head.title','List Classification')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('classify') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List Classification
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('classify.create')}}">
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
                                                <th class="sorting_asc">
                                                    No.
                                                </th>
                                                <th>
                                                   Classify Name
                                                </th>
                                                <th class="sorting">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($classifys as $index => $classify)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        {{$index + 1}}
                                                    </td>
                                                    <td>
                                                        {{$classify->name}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-info" href="{{route('classify.update',['id' => $classify->id])}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                           data-url="{{route('classify.delete',['id' => $classify->id]) }}"
                                                           data-name="{{$classify->name}}" href="#deleteModal">
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
