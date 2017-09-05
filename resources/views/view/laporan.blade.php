@extends('layouts.default')
@section('title')Pengajuan Laporan @endsection
@section('content')

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
            <div class="list-unstyled">
              {!! $model->dmr_cover !!}
              {!! $model->dmr_bab_1 !!}
              {!! $model->dmr_bab_2 !!}
              {!! $model->dmr_bab_3 !!}
              {!! $model->dmr_bab_4 !!}
            </div>
          </div>
          <div class="tab-pane" id="tor">
              {!! $model->tor_cover !!}
              {!! $model->tor_laporan !!}
          </div>
      </div>
  </div>
</div>

@endsection
