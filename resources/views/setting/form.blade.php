@extends('layouts.default')
@section('title')System Setting @endsection
@push('style')
<link href="{{ url('admin') }}/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="{{ url('admin') }}/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
<script src="{{ url('admin') }}/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="{{ url('admin') }}/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script>
    $('#demo-dp-component .input-group.date').datepicker({autoclose:true});
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile2 = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output2');
            output.src = reader.result;
        };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile3 = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output3');
            output.src = reader.result;
        };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile4 = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output4');
            output.src = reader.result;
        };
      reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endpush
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">System Setting</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">System Setting </li>
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
                        <h3 class="panel-title">System Setting</h3>
                    </div>
                    @include('common.alert')
                    <form id="form" action="{{ url('setting') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Meta Title</label>
                                        <input class="form-control" type="text" name="meta_title" value="{{ $model->meta_title }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">System Name</label>
                                        <input class="form-control" type="text" name="system_name" value="{{ $model->system_name }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Copyright</label>
                                        <input class="form-control" type="text" name="copyright" value="{{ $model->copyright }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Logo (128x128)</label></br>
                                        <img src="{{ url('contents/'.$model->logo) }}" id="output" height="128"/>
                                        <input class="form-control" accept="image/*" type="file" name="logo" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Favicon</label></br>
                                        <img src="{{ url('contents/'.$model->favicon) }}" id="output2" height="128"/>
                                        <input class="form-control" accept="image/*" type="file" name="favicon" onchange="loadFile2(event)">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Background Login (2560x1600)</label></br>
                                        <img src="{{ url('contents/'.$model->bg_login) }}" id="output3" height="200"/>
                                        <input class="form-control" accept="image/*" type="file" name="bg_login" onchange="loadFile3(event)">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Dashboard Banner (1024x300)</label></br>
                                        <img src="{{ url('contents/'.$model->dashboard_banner) }}" id="output4" height="200"/>
                                        <input class="form-control" accept="image/*" type="file" name="dashboard_banner" onchange="loadFile4(event)">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Dashboard Title</label>
                                        <input class="form-control" type="text" name="dashboard_title" value="{{ $model->dashboard_title }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Dashboard Description</label>
                                        <textarea class="form-control" name="dashboard_description" rows='10'>{{ $model->dashboard_description }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-info" type="submit" >Submit</button>
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
