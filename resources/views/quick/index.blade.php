@extends('layouts.default')
@section('title')Quick Win @endsection
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
                        Quick Win
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Quick Win</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Quick Win</h3>
            </div>
            <div class="panel-body">
                <a href="{{ url('quick-win/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <div class="panel-body">
                @include('common.alert')
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="60%">Data</th>
                            <th width="30%">Date Created</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{ 'Quick Win '.date('d-m-Y', strtotime($model->created_at))}}</td>
                                <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('quick-win/'.$model->id) }}" class="btn btn-info btn-sm btn-block"><span class="fa fa-eye"></span> Lihat</a>
                                    <a href="{{ url('quick-win/'.$model->id.'/edit') }}" class="btn btn-sm btn-warning btn-block"><span class="fa fa-pencil-square"></span> Edit</a>
                                    <button id="{{ $model->id }}" class="btn btn-sm btn-danger btn-block"><span class="fa fa-trash"></span> Hapus</button>
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
      window.location.replace(locale + '/quick-win/delete/'+id);
    });
});
</script>
@endpush
