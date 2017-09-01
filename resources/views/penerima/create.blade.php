@extends('layouts.default')
@section('title')Create Penerima Bantuan @endsection
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
                        <a href="{{ url('pendidikan') }}">Pelayanan Pendidikan</a>
                    </li>
                    <li>
                        <a href="{{ url('pendidikan/penerima/'.$pendidikan_id) }}">Penerima Bantuan</a>
                    </li>
                    <li class="active">
                        Tambah Data Penerima Bantuan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Penerima Bantuan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Tambah Penerima Bantuan</h3>
          </div>
          <div class="panel-body">
            <form id="form" action="{{ url('pendidikan/penerima') }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="pendidikan_id" value="{{ $pendidikan_id }}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input name="nama" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input class="form-control" name="birthdate" placeholder="mm/dd/yyyy" id="datepicker" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="2" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Pendidikan</label>
                                <input name="pendidikan" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Jumlah Biaya</label>
                                <input name="biaya" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Foto</label></br>
                                <img id="output" height="200"/>
                                <input class="form-control" accept="image/*" type="file" name="foto" onchange="loadFile(event)">
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
@push('style')
<link href="{{ url('admin') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
jQuery('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
</script>
@endpush
