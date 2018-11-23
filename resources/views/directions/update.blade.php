@extends('layouts.master')

@section('head.title','Update Direction')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('direction.update',$investor->name) }}
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
                                    <strong>Update Direction</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('direction.index')}}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('direction.update',['id' => $direction->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Investor Direction</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" value="{{$direction->name}}" type="text" name="direction_name" placeholder="Investor Direction" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Update</button>
                                        <a class="btn btn-danger" href="{{route('direction.index')}}">
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
