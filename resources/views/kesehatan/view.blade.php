@extends('layouts.default')
@section('title')View Pelayanan Kesehatan @endsection
@section('content')
<?php $path = 'kesehatan' ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('kesehatan') }}">Pelayanan Kesehatan</a>
                    </li>
                    <li class="active">
                        Lihat Data
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Pelayanan Kesehatan</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Lihat Pelayanan Kesehatan</h3>
            </div>
            <div class="panel-body">
              <div class="tab-base tab-stacked-left">
                <!--Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">Description</a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="false">Timeline</a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-3" aria-expanded="false">Dokumen</a>
                  </li>
                      <li class="">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-4" aria-expanded="false">Latar Belakang</a>
                  </li>
                      <li class="">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-5" aria-expanded="false">Evaluasi</a>
                  </li>
                </ul>

                <!--Tabs Content-->
                <div class="tab-content">
                  <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                    <h4 class="text-thin">Tahun : {{ $model->tahun }}</h4>
                    <h4 class="text-thin">Tempat : {{ $model->tempat }}</h4>
                    <h4 class="text-thin">Kerjasama :</h4>
                    <p>{{ $model->kerjasama }}</p>
                  </div>
                  <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                    @include('view.timeline')
                  </div>
                  <div id="demo-stk-lft-tab-3" class="tab-pane fade">
                    @include('view.document1')
                  </div>
                  <div id="demo-stk-lft-tab-4" class="tab-pane fade">
                    @include('view.latar_belakang')
                  </div>
                  <div id="demo-stk-lft-tab-5" class="tab-pane fade">
                    @include('view.evaluasi')
                  </div>
              </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
