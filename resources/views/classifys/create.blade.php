@extends('layouts.master')

@section('head.title','Create Classification')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('classify.create') }}
@endsection
@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Create Classification</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('classify.index')}}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('classify.create')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Classification Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" type="text" name="classify_name" placeholder="Classification Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Save</button>
                                        <a class="btn btn-danger" href="{{route('classify.index')}}">
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
