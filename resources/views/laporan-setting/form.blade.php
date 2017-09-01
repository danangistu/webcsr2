@extends('layouts.default')
@section('title')Laporan Setting @endsection
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
                        <h3 class="panel-title">Laporan Setting</h3>
                    </div>
                    @include('common.alert')
                    <form id="form" action="{{ url('laporan-setting') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body">
                            <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label">Left Logo</label></br>
                                       <img src="{{ url('contents/'.$model->left_logo) }}" id="output" height="128"/>
                                       <input class="form-control" accept="image/*" type="file" name="left_logo" onchange="loadFile(event)">
                                   </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Right Logo</label></br>
                                        <img src="{{ url('contents/'.$model->right_logo) }}" id="output2" height="128"/>
                                        <input class="form-control" accept="image/*" type="file" name="right_logo" onchange="loadFile2(event)">
                                    </div>
                                 </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Header 1</label>
                                        <input class="form-control" type="text" name="header1" value="{{ $model->header1 }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Header 2</label>
                                        <input class="form-control" type="text" name="header2" value="{{ $model->header2 }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Footer</label>
                                        <input class="form-control" type="text" name="footer" value="{{ $model->footer }}">
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
