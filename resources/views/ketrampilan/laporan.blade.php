@extends('layouts.default')
@section('title')Pengajuan Laporan @endsection
@section('content')

<form action="{{ url('ketrampilan/submit/laporan/') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="csr_id" value="{{ $model->id }}">
    <input type="hidden" name="type" value="ketrampilan">
    <input type="hidden" name="judul_laporan" value="{{ $judul }}">
    <div class="panel-body">
      <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-check"></span> Ajukan Laporan</button>
    </div>
    <div clas="panel-body">
      <div class="card-box">
          <ul class="nav nav-tabs navtab-bg nav-justified">
              <li class="active">
                  <a href="#dmr" data-toggle="tab" aria-expanded="false">
                      <span class="visible-xs"><i class="fa fa-home"></i></span>
                      <span class="hidden-xs">DMR</span>
                  </a>
              </li>
              <li class="">
                  <a href="#tor" data-toggle="tab" aria-expanded="true">
                      <span class="visible-xs"><i class="fa fa-user"></i></span>
                      <span class="hidden-xs">TOR</span>
                  </a>
              </li>
          </ul>
          <div class="tab-content">
              <div class="tab-pane active" id="dmr">
                  @include('form.dmr_cover')
                  @include('form.dmr_bab_1')
                  @include('form.dmr_bab_2')
                  @include('form.dmr_bab_3')
                  @include('form.dmr_bab_4')
              </div>
              <div class="tab-pane" id="tor">
                  @include('form.tor_cover')
                  @include('form.tor_laporan')
              </div>
          </div>
      </div>
    </div>
</form>

@endsection
@push('javascript')
<script src="{{ url('admin/plugins/ckeditor') }}/ckeditor.js"></script>
<script type="javascript">
  CKEDITOR.replace( 'editor' );
</script>
@endpush
