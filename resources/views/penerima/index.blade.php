@extends('layouts.default')
@section('title')Pelayanan Pendidikan @endsection
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
                    <li>
                        <a href="{{ url('/') }}">Pelayanan Pendidikan</a>
                    </li>
                    <li class="active">
                        Penerima Bantuan
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
                <h3 class="panel-title">Tabel Penerima Bantuan</h3>
            </div>
            <div class="panel-body">
                <a href="{{ url('pendidikan/penerima/create/'.$pendidikan_id) }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <div class="panel-body">
                @include('common.alert')
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="20%">Nama</th>
                          <th width="10%">Tanggal Lahir</th>
                          <th width="30%">Alamat</th>
                          <th width="10%">Pendidikan</th>
                          <th width="15%">Biaya</th>
                          <th width="10%">Foto</th>
                          <th width="5%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $model->nama }}</td>
                            <td>{{ date("d F Y", strtotime( $model->birthdate )) }}</td>
                            <td>{{ $model->alamat }}</td>
                            <td>{{ $model->pendidikan }}</td>
                            <td class="text-right">{{ 'Rp. '.number_format($model->biaya,2,',','.') }}</td>
                            <td><img src="{{ url('contents/pendidikan/foto/'.$model->foto) }}" height="100"></td>
                            <td>
                                <a href="{{ url('pendidikan/penerima/view/'.$model->id) }}" class="btn btn-info btn-sm btn-block"><span class="fa fa-eye"></span> Lihat</a>
                                <a href="{{ url('pendidikan/penerima/edit/'.$model->id) }}" class="btn btn-warning btn-sm btn-block"><span class="fa fa-pencil-square"></span> Edit</a>
                                <button id="{{ $model->id }}" class="btn btn-danger btn-sm btn-block"><span class="fa fa-eye"></span> Hapus</button>
                            </td>
                        </tr>
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
$('.btn.btn-danger.btn-sm.btn-block').on('click', function(){
    var id = $(this).attr('id');
    var locale = "{{ url('/') }}";
    swal({
      title: 'Apakah anda yakin?',
      text: "Data yang dihapus tidak dapat dikembalikan lagi!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then(function () {
      window.location.replace(locale + '/pendidikan/penerima/delete/'+id);
    });
});
</script>
@endpush
