@extends('layouts.default')
@section('title')Pengajuan Laporan @endsection
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
                        Pengajuan Laporan
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Pengajuan Laporan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Pengajuan Laporan</h3>
            </div>
            <!-- <div class="panel-body">
                <a href="{{ url('kode-pendanaan/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <div class="panel-body">
              @include('common.alert')
              <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul Laporan</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Laporan</th>
                          <th>Approval SPS</th>
                          <th>Approval GM</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php($i = 1)
                      @foreach($models as $model)
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $model->judul_laporan }}</td>
                              <td>{{ date("d F Y", strtotime($model->created_at)) }}</td>
                              <td>
                                  <a href="{{ url('pengajuan-laporan/dmr/'.$model->id) }}" class="btn btn-success btn-sm btn-block"><span class="fa fa-eye"></span> Laporan DMR</a>
                                  <a href="{{ url('pengajuan-laporan/tor/'.$model->id) }}" class="btn btn-success btn-sm btn-block"><span class="fa fa-eye"></span> Laporan TOR</a>
                              </td>
                              @if($model->approval_sps == 'pending')
                                <td><a class="btn btn-info btn-sm btn-block"> Pending</a></td>
                              @elseif($model->approval_sps == 'revisi')
                                <td><a href="{{ url('pengajuan-laporan/revisi/'.$model->id) }}" class="btn btn-sm btn-warning btn-block"> Revisi</a></td>
                              @else
                                <td><a class="btn btn-success btn-block"> Approve</a></td>
                              @endif
                              @if($model->approval_gm == 'pending')
                                <td><a class="btn btn-info btn-sm btn-block"> Pending</a></td>
                              @elseif($model->approval_gm == 'revisi')
                                <td><a href="{{ url('pengajuan-laporan/revisi/'.$model->id) }}" class="btn btn-sm btn-warning btn-block"> Revisi</a></td>
                              @else
                                <td><a class="btn btn-success btn-sm btn-block btn-block"> Approve</a></td>
                              @endif
                              @if($model->approval_sps == 'approve' && $model->approval_gm == 'approve')
                                <td><a class="btn btn-primary btn-sm btn-block"><span class="fa fa-print"></span> Print</a></td>
                              @else
                                <td> Tidak ada action</td>
                              @endif
                          </tr>
                          @php($i++)
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
