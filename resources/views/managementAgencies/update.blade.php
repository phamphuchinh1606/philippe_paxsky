@extends('layouts.master')

@section('head.title','Update Management Agency')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('management_agency.update',$managementAgency->name) }}
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
                                    <strong>Update Management Agency</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('management_agency.index')}}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('management_agency.update',['id' => $managementAgency->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Management Agency Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" value="{{$managementAgency->name}}" type="text" name="management_agency_name" placeholder="Management Agency name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Update</button>
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
