@extends('layouts.default')
@section('title')Create Laporan Setting @endsection

@push('javascript')
<script src="{{ url('admin') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<script src="{{ url('admin') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
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
                        Laporan Setting
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Laporan Setting</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Laporan Setting</h3>
            </div>
            <div class="panel-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
