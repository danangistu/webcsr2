@extends('layouts.default')
@section('title')View Pelayanan Pendidikan @endsection
@section('content')
<?php $path = 'pendidikan' ?>
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
                        <a>Penerima Bantuan</a>
                    </li>
                    <li class="active">
                        Lihat Data Penerima Bantuan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Pelayanan Pendidikan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Lihat Data Penerima Bantuan</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover table-bordered">
                  <tbody>
                      <tr>
                          <td width="20%" class="text-center">Nama</td>
                          <td>{{ $model->nama }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Tanngal Lahir</td>
                          <td>{{ $model->birthdate }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Alamat</td>
                          <td>{{ $model->alamat }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Pendidikan</td>
                          <td>{{ $model->pendidikan }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Jumlah Biaya</td>
                          <td>{{ $model->biaya }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Keterangan</td>
                          <td>{{ $model->keterangan }}</td>
                      </tr>
                      <tr>
                          <td class="text-center">Foto</td>
                          <td><img src="{{ url('contents/pendidikan/foto/'.$model->foto) }}" height="250"></td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
