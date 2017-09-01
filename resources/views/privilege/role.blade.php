@extends('layouts.default')
@section('title')Edit Privilege Role @endsection
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
        <h1 class="page-header text-overflow">Edit Privilege Role</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('privilege') }}">Privilege</a></li>
        <li class="active">Edit Privilege Role</li>
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
                        <h3 class="panel-title">Edit Privilege Role</h3>
                    </div>
                    <form id="form" action="{{ url('privilege/role') }}" data-toggle="validator" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label">Pelayanan Masyarakat</label>
                                      <select name="pelayanan" class="form-control">
                                        <option value="1" {{ $model->pelayanan == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->pelayanan == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Pembinaan Hubungan</label>
                                      <select name="pembinaan" class="form-control">
                                        <option value="1" {{ $model->pembinaan == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->pembinaan == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Pemberdayaan</label>
                                      <select name="pemberdayaan" class="form-control">
                                        <option value="1" {{ $model->pemberdayaan == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->pemberdayaan == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Regulasi</label>
                                      <select name="regulasi" class="form-control">
                                        <option value="1" {{ $model->regulasi == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->regulasi == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Quick Win</label>
                                      <select name="quick" class="form-control">
                                        <option value="1" {{ $model->quick == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->quick == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Jenis Pendanaan</label>
                                      <select name="pendanaan" class="form-control">
                                        <option value="1" {{ $model->pendanaan == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->pendanaan == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Pengajuan Laporan</label>
                                      <select name="pengajuan" class="form-control">
                                        <option value="1" {{ $model->pengajuan == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->pengajuan == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Laporan SPS</label>
                                      <select name="sps" class="form-control">
                                        <option value="1" {{ $model->sps == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->sps == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Laporan GM</label>
                                      <select name="gm" class="form-control">
                                        <option value="1" {{ $model->gm == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->gm == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">User Privilege</label>
                                      <select name="privilege" class="form-control">
                                        <option value="1" {{ $model->privilege == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->privilege == '0' ? 'selected="selected"':null }}>Non Active</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Setting</label>
                                      <select name="setting" class="form-control">
                                        <option value="1" {{ $model->setting == '1' ? 'selected="selected"':null }}>Active</option>
                                        <option value="0" {{ $model->setting == '0' ? 'selected="selected"':null }}>Non Active</option>
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
