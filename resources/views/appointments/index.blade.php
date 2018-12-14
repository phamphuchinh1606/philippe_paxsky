@extends('layouts.master')

@section('head.title','List Visit')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/ladda-themeless.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/appointment.css')}}" rel="stylesheet">
    <style>
        .checked {
            color: orange;
        }
    </style>
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/moment.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/spin.min.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/ladda.min.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/plugins/loading-buttons.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/appointment.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('appointment') }}
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
                                <a data-toggle="modal" class="btn btn-block btn-outline-primary active"
                                   href="#appointmentModal" id="btn-new-appointment">
                                    Add Visit
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success clearfix">
                                    {{ \Session::get('success') }}
                                </div>
                            @endif
                            <input type="hidden" value="{{route('appointment.update')}}" id="url_show_detail">
                            <input type="hidden" value="{{route('appointment.update')}}" id="url_update">
                            <input type="hidden" value="{{route('appointment.create')}}" id="url_create">
                            <input type="hidden" value="{{route('appointment.delete')}}" id="url_delete">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table appointment-list table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th class="status">
                                                    Status
                                                </th>
                                                <th class="date-visit">
                                                    Date
                                                </th>
                                                <th class="time-visit">
                                                    Time
                                                </th>
                                                <th class="customer-name">
                                                    Client Name
                                                </th>
                                                <th class="sale-name">
                                                    Sales Name
                                                </th>
                                                <th class="building-name">
                                                    Building Name
                                                </th>
                                                <th class="rate">
                                                    Rate
                                                </th>
                                                <th class="comment">
                                                    Comment
                                                </th>
                                                <th class="action"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($appointments as $index => $appointment)
                                                <tr role="row" class="odd" id="{{$appointment->id}}">
                                                    <td class="text-center">
                                                        <span class="badge {{$appointment->status_class}}">{{$appointment->status_name}}</span>
                                                    </td>
                                                    <td>
                                                        {{$appointment->date_str}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->time_str}}
                                                    </td>
                                                    <td>
                                                        {{$appointment->full_name}}
                                                    </td>
                                                    <td>
                                                        @if(isset($appointment->user))
                                                            {{$appointment->user->first_name.' '.$appointment->user->last_name}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($appointment->building))
                                                            {{$appointment->building->name}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @for($i = 0 ; $i < $appointment->rate ; $i++)
                                                                <span class="fa fa-star checked"></span>
                                                            @endfor
                                                            @for($i = $appointment->rate ; $i < 5 ; $i++)
                                                                <span class="fa fa-star"></span>
                                                            @endfor
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$appointment->note}}
                                                    </td>
                                                    <td class="text-center app-col-action">
                                                        <button class="btn btn-info" value="{{$appointment->id}}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    {{$appointments->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('appointments.partials.__modal_create_update')
@endsection
