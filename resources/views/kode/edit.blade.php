@extends('layouts.default')
@section('title')Create Kode Pendanaan @endsection

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
                    <li>
                        <a href="{{ url('kode-pendanaan') }}">Kode Pendanaan</a>
                    </li>
                    <li class="active">
                        Edit Data
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Kode Pendanaan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Kode Pendanaan</h3>
            </div>
            <div class="panel-body">
              {{ Form::model($model, array('route' => array('kode-pendanaan.update', $model->id),'files'=> true, 'method' => 'PUT')) }}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-sm-8">
                              <div class="form-group">
                                  <label class="control-label">Kode</label>
                                  <input name="kode" type="text" class="form-control" value="{{ $model->kode }}" required>
                              </div>
                          </div>
                          <div class="col-sm-8">
                              <div class="form-group">
                                  <label class="control-label">Nama Jenis Pendanaan</label>
                                  <input name="title" type="text" class="form-control" value="{{ $model->title }}" required>
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
