@extends('layouts.master')

@section('head.title','Create Management Agency')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('management_agency.create') }}
@endsection
@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Create Management Agency</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('management_agency.index')}}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('management_agency.create')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Management Agency Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" type="text" name="management_agency_name" placeholder="Management Agency Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Save</button>
                                        <a class="btn btn-danger" href="{{route('management_agency.index')}}">
                                            <i class="fa fa-ban"></i> Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
