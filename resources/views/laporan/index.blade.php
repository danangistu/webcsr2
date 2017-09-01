@extends('layouts.default')
@section('title')Laporan Pendanaan @endsection
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
        <h1 class="page-header text-overflow">Laporan Pendanaan</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Laporan Pendanaan</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Laporan Pendanaan </h3>
            </div>
            <!-- <div class="panel-body">
                <a href="{{ url('Laporan-pendanaan/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <div class="panel-body">
                @include('common.alert')
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
            window.location.replace(locale + '/Laporan-pendanaan/delete/'+id);
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
