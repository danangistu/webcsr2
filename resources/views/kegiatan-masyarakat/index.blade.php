@extends('layouts.default')
@section('title')Partisipasi Kegiatan Masyarakat @endsection
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
                        Partisipasi Kegiatan Masyarakat
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Partisipasi Kegiatan Masyarakat</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Partisipasi Kegiatan Masyarakat</h3>
            </div>
            <div class="panel-body">
                <a href="{{ url('kegiatan-masyarakat/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
                <a href="{{ url('kegiatan-masyarakat/print') }}" class="btn btn-inverse"><span class="fa fa-print"></span> Print</a>
                <a href="{{ url('kegiatan-masyarakat/export') }}" class="btn btn-inverse"><span class="fa fa-download"></span> Export</a>
            </div>
            <div class="panel-body">
                @include('common.alert')
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tempat</th>
                            <th class="min-tablet">Latar Belakang Kegiatan</th>
                            <th>Tahun</th>
                            <th>Anggaran</th>
                            <th width="10%"></th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $model)
                            <tr class="{{ $model->kode == '' ? 'danger':null }}">
                                <td>{{ $model->tempat }}</td>
                                <td>{{ substr($model->kerjasama,0,50) }} ...</td>
                                <td>{{ $model->tahun }}</td>
                                <td class="text-right">{{ 'Rp. '.number_format($model->anggaran,2,',','.') }}</td>
                                <td>
                                  <button id="{{ $model->id }}" type="button" class="btn btn-success btn-anggaran btn-sm btn-block" data-toggle="modal" data-target="#modalAnggaran">Edit Anggaran</button>
                                  <button id="{{ $model->id }}" type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#modalLaporan">Ajukan Laporan</button>
                                </td>
                                <td>
                                    <a href="{{ url('kegiatan-masyarakat/'.$model->id) }}" class="btn btn-info btn-sm btn-block"><span class="fa fa-eye"></span> Lihat</a>
                                    <a href="{{ url('kegiatan-masyarakat/'.$model->id.'/edit') }}" class="btn btn-sm btn-warning btn-block"><span class="fa fa-pencil-square"></span> Edit</a>
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

<!-- Modal -->
<div id="modalAnggaran" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form id="formAnggaran" method="post" action="kegiatan-masyarakat/anggaran">

      </form>
    </div>
  </div>
</div>
<div id="modalLaporan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Judul Laporan</h4>
      </div>
      <br/>
      <div id="popupLaporan">
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
<script>
$('.btn.btn-sm.btn-danger.btn-block').on('click', function(){
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
      window.location.replace(locale + '/kegiatan-masyarakat/delete/'+id);
    });
});
var locale  = "{{ url('/') }}";
$('.btn.btn-success.btn-anggaran').on('click', function(){
    var id = $(this).attr('id');
    $.ajax({
        url: locale + '/kegiatan-masyarakat/get-anggaran/'+id,
        success: function(result) {
          $("#formAnggaran").html(result);
          cekKode();
        }
    });
});
$('.btn.btn-sm.btn-primary.btn-block').on('click', function(){
    var id = $(this).attr('id');
    $('#popupLaporan').html('<form action=kegiatan-masyarakat/create/laporan/'+ id +' method=post>{{ csrf_field() }}<div class=form-group><input class=form-control name=judul placeholder="Judul Laporan"required></div><button class="btn btn-primary" type=submit>Submit</button></form>');
});
function cekKode(){
  $("#kode").focusout(function() {
    $.ajax({
        url: locale + '/cek-kode/'+$(this).val(),
        success: function(result) {
          $("#title").val(result);
          $("#submitAnggaran").removeAttr('disabled');
        }
    });
  });
  $("#kode").keypress(function(e) {
      if(e.which == 13) {
        $.ajax({
            url: locale + '/cek-kode/'+$(this).val(),
            success: function(result) {
              $("#title").val(result);
              $("#submitAnggaran").removeAttr('disabled');
            }
        });
      }
  });
}
</script>
@endpush
