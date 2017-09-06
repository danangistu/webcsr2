@extends('layouts.default')
@section('title')Laporan Masuk @endsection
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
                        Laporan Masuk
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Laporan Masuk</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Laporan Masuk</h3>
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
                          <th>User</th>
                          <th>Judul Laporan</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Laporan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php($i = 1)
                      @foreach($models as $model)
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $model->name }}</td>
                              <td>{{ $model->judul_laporan }}</td>
                              <td>{{ date("d F Y", strtotime($model->created_at)) }}</td>
                              <td>
                                  <a href="{{ url('pengajuan-laporan/dmr/'.$model->id) }}" class="btn btn-primary btn-sm btn-block"><span class="fa fa-eye"></span> Laporan DMR</a>
                                  <a href="{{ url('pengajuan-laporan/tor/'.$model->id) }}" class="btn btn-primary btn-sm btn-block"><span class="fa fa-eye"></span> Laporan TOR</a>
                              </td>
                              <td>
                                <a id="{{ $model->id }}" class="btn btn-success btn-block"><span class="fa fa-check"></span> Approve</a>
                                <a href="{{ url('laporan-masuk-gm/revisi/'.$model->id) }}" class="btn btn-warning btn-block"><span class="fa fa-edit"></span> Revisi</a>
                              </td>
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
@push('javascript')
<script>
$('.btn.btn-success.btn-block').on('click', function(){
    var id = $(this).attr('id');
    var locale = "{{ url('/') }}";
    swal({
      title: 'Peringatan!',
      text: "Apakah anda yakin akan melakukan aksi?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Approve',
      cancelButtonText: 'Batal'
    }).then(function () {
      window.location.replace(locale + '/laporan-masuk-gm/approve/'+id);
    });
});
</script>
@endpush
