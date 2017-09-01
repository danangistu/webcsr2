@extends('layouts.default')
@section('title')Roadmap @endsection
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
                        <a href="{{ url('modal') }}">Bantuan Pengembangan dan Modal Usaha</a>
                    </li>
                    <li class="active">
                        Roadmap
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Roadmap</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Roadmap</h3>
            </div>
            <div class="panel-body">
                <a href="{{ url('modal/roadmap/create/'.$modal_id) }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <div class="panel-body">
                @include('common.alert')
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th >Judul</th>
                          <th >Deskripsi</th>
                          <th width="10%">Foto</th>
                          <th width="20%">Anggaran</th>
                          <th width="5%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $model->title }}</td>
                            <td>{{ $model->description }}</td>
                            <td><img src="{{ url('contents/modal/foto/'.$model->foto) }}" height="100"></td>
                            <td class="text-right">{{ 'Rp. '.number_format($model->anggaran,2,',','.') }}</td>
                            <td>
                                <a href="{{ url('modal/roadmap/edit/'.$model->id) }}" class="btn btn-warning btn-sm btn-block"><span class="fa fa-pencil-square"></span> Edit</a>
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
      window.location.replace(locale + '/modal/roadmap/delete/'+id);
    });
});
</script>
@endpush
