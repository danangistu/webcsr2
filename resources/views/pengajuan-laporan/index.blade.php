@extends('layouts.default')
@section('title')Pengajuan Laporan @endsection
@push('style')
<!--Bootstrap Table [ OPTIONAL ]-->
<link href="{{ url('admin') }}/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
@endpush
@push('javascript')
<!--DataTables [ OPTIONAL ]-->
<script src="{{ url('admin') }}/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<!--DataTables Sample [ SAMPLE ]-->
<script src="{{ url('admin') }}/js/demo/tables-datatables.js"></script>
@endpush
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Pengajuan Laporan</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active"> Pengajuan Laporan</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Pengajuan Laporan </h3>
            </div>

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
                                <td><a href="{{ url($model->type.'/laporan/'.$model->csr_id) }}" class="btn btn-primary btn-block"> Laporan</a></td>
                                @if($model->approval_sps == 'pending')
                                  <td><a class="btn btn-info btn-block"> Pending</a></td>
                                @elseif($model->approval_sps == 'revisi')
                                  <td><a href="{{ url('pengajuan-laporan/revisi/'.$model->id) }}" class="btn btn-warning btn-block"> Revisi</a></td>
                                @else
                                  <td><a class="btn btn-success btn-block"> Approve</a></td>
                                @endif
                                @if($model->approval_gm == 'pending')
                                  <td><a class="btn btn-info btn-block"> Pending</a></td>
                                @elseif($model->approval_gm == 'revisi')
                                  <td><a href="{{ url('pengajuan-laporan/revisi/'.$model->id) }}" class="btn btn-warning btn-block"> Revisi</a></td>
                                @else
                                  <td><a class="btn btn-success btn-block btn-block"> Approve</a></td>
                                @endif
                                @if($model->approval_sps == 'approve' && $model->approval_gm == 'approve')
                                  <td><a class="btn btn-primary btn-block"> Print</a></td>
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
    <!--===================================================-->
    <!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
@push('javascript')
<script src="{{ url('admin') }}/plugins/bootbox/bootbox.min.js"></script>
<script>
$('.btn.btn-danger.btn-icon.icon-lg.fa.fa-trash').on('click', function(){
    var id = $(this).attr('id');
    var locale = "{{ url('/') }}";
    bootbox.confirm("Apakah anda yakin akan menghapus data?", function(result) {
        if (result) {
            window.location.replace(locale + '/pengajuan-laporan/delete/'+id);
        }else{
            $.niftyNoty({
                type: 'info',
                icon : 'fa fa-minus',
                message : 'Perintah dibatalkan.',
                container : 'floating',
                timer : 3000
            });
        };

    });
});
</script>
@endpush
