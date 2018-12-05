@extends('layouts.master')

@section('head.title','List Visit')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('user') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List Visit
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" data-toggle="modal" data-target="#primaryModal">
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
                                                    Status
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Client Name
                                                </th>
                                                <th>
                                                    Sales Name
                                                </th>
                                                <td>
                                                    Rate
                                                </td>
                                                <th>
                                                    Comment
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($appointments as $index => $appointment)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        {{$appointment->status}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->status}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->status}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->status}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->status}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->status}}
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

    <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal title</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <span id="confirm-content"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary name-cancel" type="button" data-dismiss="modal">Cancel</button>
                    <form class="inline" action="route" method="post" id="formHolder">
                        @csrf
                        <button class="btn btn-primary name-ok" type="submit">OK</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
