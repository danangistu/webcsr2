@extends('layouts.default')
@section('title')Pengajuan Laporan @endsection
@section('content')

          <form action="{{ url('kegiatan-masyarakat/submit/laporan/') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="csr_id" value="{{ $model->id }}">
          <input type="hidden" name="type" value="kegiatan-masyarakat">
          <input type="hidden" name="judul_laporan" value="{{ $judul }}">
          <div class="panel-body">
            <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-check"></span> Ajukan Laporan</button>
          </div>
          <div clas="panel-body">
              <textarea class="ckeditor" name="laporan" id="editor" name="editor">
                <table width="100%" border="0">
                  <tr>
                    <th rowspan="2"><img src="{{ asset('contents/'.$lapset->left_logo) }}" width="100" height="50"></th>
                    <th>{{ $lapset->header1 }}</th>
                    <th rowspan="2"><img src="{{ asset('contents/'.$lapset->right_logo) }}" width="100" height="50"></th>
                  </tr>
                  <tr>
                    <th style="background-color:#ecf0f1">{{ $lapset->header2 }}</th>
                  </tr>
                  <tr>
                    <th colspan="3" text-align="center">
                      <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                      <h1>{{ strtoupper($judul) }}</h1>
                      <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                      <h1>{{ strtoupper($lapset->footer) }}</h1>
                      <br/><br/><br/><br/>
                    </td>
                  </th>
                </table>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>1. LATAR BELAKANG</h2>
                {!! $latar->latar_belakang !!}<br/>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>2. MAKSUD DAN TUJUAN</h2>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>3. JADWAL RENCANA PELAKSANAAN</h2>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>4. ANGGARAN TERSEDIA</h2>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>5. PELAKSANAAN KEGIATAN</h2>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>6. MANFAAT</h2>
                {!! $evaluasi->manfaat !!}<br/>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>7. RENCANA ANGGARAN BIAYA</h2>
                <table width="100%" border="1">
                  <tr>
                    <th>No.</th>
                    <th>Uraian</th>
                    <th>Volume</th>
                    <th>Satuan</th>
                    <th>Harga Satuan (Rp)</th>
                    <th>Jumlah</th>
                  <tr>
                  <tr>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                  </tr>
                  <tr>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> &nbsp </td>
                    <td> Total </td>
                    <td> <b>{{ 'Rp. '.number_format($model->anggaran,2,',','.') }}</b> </td>
                  </tr>
                </table>
                <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                <br/><h2>8. RINGKASAN</h2>
                {!! $evaluasi->ringkasan !!}<br/>
              </textarea>
          </div>
          </form>

@endsection
@push('javascript')
<script src="{{ url('admin/plugins/ckeditor') }}/ckeditor.js"></script>
<script type="javascript">
  CKEDITOR.replace( 'editor' );
</script>
@endpush
