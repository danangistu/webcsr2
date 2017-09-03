@extends('layouts.default')
@section('title')Create User @endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        Tambah Data User
                    </li>
                </ol>
            </div>
            <h4 class="page-title">User</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Tambah User</h3>
          </div>
          <div class="panel-body">
            <form id="form" action="{{ url('users') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Privilege</label>
                                <select name="privilege_id" class="form-control">
                                  @foreach($privileges as $priv)
                                  <option value="{{ $priv->id }}">{{ $priv->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input class="form-control" type="text" name="username">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="text" name="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Photo Profile</label></br>
                                <img id="output" height="128"/>
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
