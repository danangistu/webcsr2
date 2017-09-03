@extends('layouts.default')
@section('title')User @endsection
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
                        Data User
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Data User</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Data User</h3>
            </div>
            <div class="panel-body">
                <a href="{{ url('users/create/') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <div class="panel-body">
                @include('common.alert')
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th >Name</th>
                          <th >Username</th>
                          <th >Email</th>
                          <th width="10%">Image</th>
                          <th >Privilege</th>
                          <th width="5%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($models as $model)
                        <tr>
                          <td>{{ $model->name }}</td>
                          <td>{{ $model->username }}</td>
                          <td>{{ $model->email }}</td>
                          <td><img src="{{ url('contents/'.$model->image) }}" height="100"></td>
                          <td>{{ $model->privilege }}</td>
                            <td>
                                <a href="{{ url('users/'.$model->id.'/edit') }}" class="btn btn-warning btn-sm btn-block"><span class="fa fa-pencil-square"></span> Edit</a>
                                <button id="{{ $model->id }}" class="btn btn-danger btn-sm btn-block"><span class="fa fa-eye"></span> Hapus</button>
                            </td>
                        </tr>
                        @php( $i++ )
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
      window.location.replace(locale + '/users/delete/'+id);
    });
});
</script>
@endpush
