@extends('layouts.default')
@section('title')Edit JEnis Pengobatan @endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('kesehatan') }}">Pelayanan Kesehatan</a>
                    </li>
                    <li>
                        <a href="{{ url('kesehatan/pengobatan/'.$id) }}">Jenis Pengobatan</a>
                    </li>
                    <li class="active">
                        Edit Data Jenis Pengobatan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Jenis Pengobatan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Edit Jenis Pengobatan</h3>
          </div>
          <div class="panel-body">
            <form id="form" action="{{ url('kesehatan/pengobatan/edit/'.$id) }}" data-toggle="validator" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="kesehatan_id" value="{{ $model->kesehatan_id }}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Nama Penyakit</label>
                                <input name="penyakit" type="text" class="form-control" value="{{ $model->penyakit }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Obat</label>
                                <input name="obat" type="text" class="form-control" value="{{ $model->obat }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label class="control-label">Anggaran</label>
                              <input name="anggaran" type="number" class="form-control" value="{{ isset($model) ? $model->anggaran:null }}" required>
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
