@extends('layouts.default')
@section('title')Create Profile @endsection

@push('javascript')
<script src="{{ url('admin') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<script src="{{ url('admin') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
<script>
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
<?php $path = 'kode-pendanaan' ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        Profile
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Profile</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Profile</h3>
            </div>
            <div class="panel-body">
              @include('common.alert')
              <form id="form" action="{{ url('profile') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{ $model->id }}">
                  <div class="panel-body">
                      <div class="row">
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
            </div>
        </div>
    </div>
</div>
@endsection
