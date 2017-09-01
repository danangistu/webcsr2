@extends('layouts.default')
@section('title')Create Pemberian Bantuan @endsection
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
                        <a href="{{ url('bencana') }}">Bantuan Bencana Alam</a>
                    </li>
                    <li>
                        <a href="{{ url('bencana/pemberian/'.$bencana_id) }}">Pemberian Bantuan</a>
                    </li>
                    <li class="active">
                        Tambah Data Pemberian Bantuan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Pemberian Bantuan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Tambah Pemberian Bantuan</h3>
          </div>
          <div class="panel-body">
            <form id="form" action="{{ url('bencana/pemberian') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="bencana_id" value="{{ $bencana_id }}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Foto</label></br>
                                <img id="output" height="200"/>
                                <input class="form-control" accept="image/*" type="file" name="foto" onchange="loadFile(event)">
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
