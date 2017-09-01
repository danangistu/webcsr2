@extends('layouts.default')
@section('title')Create Regulasi @endsection

@push('javascript')
<script src="{{ url('admin') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<script src="{{ url('admin') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
@endpush
@section('content')
<?php $path = 'regulasi' ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('regulasi') }}">Regulasi</a>
                    </li>
                    <li class="active">
                        Tambah Data
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Regulasi</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Regulasi</h3>
            </div>
            <div class="panel-body">
              <form id="form" action="{{ url('regulasi') }}" data-toggle="validator" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="control-label">Document</label>
                                  @if(isset($model->document))
                                      <input type="text" class="form-control" value="{{ isset($model->document) ? $model->document:null }}" disabled />
                                  @endif
                                  <input accept=".doc, .docx,.pdf" type="file" class="form-control" name="document">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="control-label">Keterangan</label>
                                  <textarea class="form-control" name="description">{{ isset($model->description) ? $model->description:null }}</textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer text-right">
                      <button class="btn btn-info" type="submit">Submit</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
