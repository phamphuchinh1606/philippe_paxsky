@extends('layouts.master')

@section('head.title','List News')

@section('head.css')
    <link href="{{asset('css/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/ladda-themeless.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/news.css')}}" rel="stylesheet">
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
    <script type="text/javascript" src="{{asset('js/news.js')}}" class="view-script"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('news') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List News
                            <div class="card-header-actions">
                                <a data-toggle="modal" class="btn btn-block btn-outline-primary active"
                                   href="#newsModal" id="btn-new-appointment">
                                    Add News
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success clearfix">
                                    {{ \Session::get('success') }}
                                </div>
                            @endif
                            <input type="hidden" value="{{route('news.update')}}" id="url_show_detail">
                            <input type="hidden" value="{{route('news.update')}}" id="url_update">
                            <input type="hidden" value="{{route('news.create')}}" id="url_create">
                            <input type="hidden" value="{{route('news.delete')}}" id="url_delete">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table news-list table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th class="no">
                                                    No.
                                                </th>
                                                <th class="image">
                                                    Image
                                                </th>
                                                <th class="title">
                                                    Title
                                                </th>
                                                <th class="public_date">
                                                    Public Date
                                                </th>
                                                <th class="status">
                                                    Status
                                                </th>
                                                <th class="content">
                                                    Content
                                                </th>
                                                <th class="action">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($newses as $index => $news)
                                                <tr role="row" class="odd" id="{{$news->id}}">
                                                    <td>{{$index+1}}</td>
                                                    <td>
                                                        <img src="{{\App\Common\ImageCommon::showImage($news->image)}}" style="width: 100px;height: auto"/>
                                                    </td>
                                                    <td>
                                                        <a href="{{$news->url}}" target="_blank">{{$news->title}}</a>
                                                    </td>
                                                    <td>
                                                        {{$news->public_date_str}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge {{$news->status_class}}">{{$news->status_name}}</span>
                                                    </td>
                                                    <td>
                                                        {{\App\Common\AppCommon::showTextDot($news->content,250)}}
                                                    </td>
                                                    <td class="text-center app-col-action">
                                                        <button class="btn btn-info" value="{{$news->id}}">
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
                                    {{$newses->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('newses.partials.__modal_create_update')
@endsection
