@extends('layouts.default')
@section('title')Edit Privilege @endsection
@push('style')
<link href="{{ url('admin') }}/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="{{ url('admin') }}/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
@endpush
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Edit Data Privilege</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('privilege') }}">Privilege</a></li>
        <li class="active">Edit Data</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Privilege</h3>
                    </div>
                    {{ Form::model($model, array('route' => array('privilege.update', $model->id),'files'=> true,'class'=>'form-horizontal', 'method' => 'PUT')) }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label">Name</label>
                                      <input name="name" type="text" value="{{ $model->name }}" class="form-control" required>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label">Theme</label>
                                      <select name="theme" class="form-control">
                                        <option value="theme-dark" {{ $model->theme == 'theme-dark' ? 'selected="selected"':null }}>Dark</option>
                                        <option value="theme-blue" {{ $model->theme == 'theme-blue' ? 'selected="selected"':null }}>Blue</option>
                                        <option value="theme-cyan" {{ $model->theme == 'theme-cyan' ? 'selected="selected"':null }}>Cyan</option>
                                        <option value="theme-light" {{ $model->theme == 'theme-light' ? 'selected="selected"':null }}>Light</option>
                                      </select>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-info" type="submit">Submit</button>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!--End Block Styled Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
