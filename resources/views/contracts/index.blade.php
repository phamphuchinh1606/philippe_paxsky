@extends('layouts.master')

@section('head.title','List Contract')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/ladda-themeless.min.css')}}" rel="stylesheet">
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
                            <i class="fa fa-edit"></i> List Contract
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('contract.create')}}">
                                    Add Contract
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
                                        <table class="table appointment-list table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th class="no">
                                                    No.
                                                </th>
                                                <th class="status">
                                                    Status
                                                </th>
                                                <th class="contract-number">
                                                    Contract Code
                                                </th>
                                                <th class="company-name">
                                                    Company Name
                                                </th>
                                                <th class="charge-user">
                                                    Charge User
                                                </th>
                                                <th class="start-date">
                                                    Start Date
                                                </th>
                                                <th class="end-date">
                                                    End Date
                                                </th>
                                                <th class="contract-amount">
                                                    Amount
                                                </th>
                                                <th class="action">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($contracts as $index => $contract)
                                                <tr role="row" class="odd" id="{{$contract->id}}">
                                                    <td>{{$index+1}}</td>
                                                    <td class="text-center">
                                                        {{--<span class="badge {{$appointment->status_class}}">{{$appointment->status_name}}</span>--}}
                                                    </td>
                                                    <td>
                                                        {{$contract->contract_code}}
                                                    </td>
                                                    <td>
                                                        {{$contract->company_name}}
                                                    </td>
                                                    <td>
                                                        @if(isset($contract->user))
                                                            {{$contract->user->first_name.' '.$contract->user->last_name}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$contract->start_date}}
                                                    </td>
                                                    <td>
                                                        {{$contract->end_date}}
                                                    </td>
                                                    <td>
                                                        {{$contract->total_amount}}
                                                    </td>
                                                    <td class="text-center app-col-action">
                                                        <a class="btn btn-info" href="{{route('contract.update',['id' => $contract->id])}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    {{$contracts->links()}}
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
