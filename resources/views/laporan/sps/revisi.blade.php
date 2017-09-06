@extends('layouts.default')
@section('title')Revisi Laporan @endsection
@include('includes.datatable')
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
                        Revisi Laporan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Revisi Laporan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Revisi Laporan</h3>
            </div>
            <!-- <div class="panel-body">
                <a href="{{ url('kode-pendanaan/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <div class="panel-body">
              <form id="form" action="" data-toggle="validator" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="laporan_id" value="{{ $id }}">
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="control-label">Catatan Revisi</label>
                                  <textarea name="revisi" class="form-control"></textarea>
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
