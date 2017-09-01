@extends('layouts.default')
@section('title')Edit User @endsection
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
</script>
@endpush
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Edit User</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('user') }}">User</a></li>
        <li class="active">Edit User </li>
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
                    {{ Form::model($model, array('route' => array('users.update', $model->id),'files'=> true,'class'=>'form-horizontal', 'method' => 'PUT')) }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Privilege</label>
                                        <select name="privilege_id" class="form-control">
                                          @foreach($privileges as $priv)
                                          <option value="{{ $priv->id }}" {{ $priv->id == $model->privilege_id ? 'selected="selected"':null }}>{{ $priv->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ $model->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input class="form-control" type="text" name="username" value="{{ $model->username }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input class="form-control" type="text" name="email" value="{{ $model->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Photo Profile</label></br>
                                        <img src="{{ url('contents/'.$model->image) }}" id="output" height="128"/>
                                        <input class="form-control" accept="image/*" type="file" name="image" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input class="form-control" type="password" name="password">
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
