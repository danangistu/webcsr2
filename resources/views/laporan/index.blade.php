@extends('layouts.default')
@section('title')Laporan Pendanaan @endsection
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
                        Laporan Pendanaan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Laporan Pendanaan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Laporan Pendanaan</h3>
            </div>
            <!-- <div class="panel-body">
                <a href="{{ url('kode-pendanaan/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <div class="panel-body">
              <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Jenis</th>
                          <th>Tahun {{ $year-3 }}</th>
                          <th>Tahun {{ $year-2 }}</th>
                          <th>Tahun {{ $year-1 }}</th>
                          <th>Tahun {{ $year }}</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $i=1; ?>
                      @foreach($models as $model)
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $model['title'] }}</td>
                              <td class="text-right">{{ 'Rp. '.number_format($model['tahun3'],2,',','.') }}</td>
                              <td class="text-right">{{ 'Rp. '.number_format($model['tahun2'],2,',','.') }}</td>
                              <td class="text-right">{{ 'Rp. '.number_format($model['tahun1'],2,',','.') }}</td>
                              <td class="text-right">{{ 'Rp. '.number_format($model['tahun'],2,',','.') }}</td>
                          </tr>
                          <?php $i++; ?>
                      @endforeach
                      <tr>
                        <td><h4>Total</h4></td>
                        <td></td>
                        @foreach($total as $tot)
                          <td class="text-right"><h4>{{ 'Rp. '.number_format($tot,2,',','.') }}</h4></td>
                        @endforeach
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
