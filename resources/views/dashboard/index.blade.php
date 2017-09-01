@extends('layouts.default')
@section('title')Dashboard @endsection
@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="active">
                        Dashboard
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Selamat Datang {{ auth()->user()->name }}</h2>
                <p class="panel-sub-title text-muted">{{ $setting->dashboard_title }}</p>
            </div>
            <div class="panel-body">
                {!! $setting->dashboard_description !!}
            </div>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-custom">
            <i class="mdi mdi-nature-people widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Pelayanan Masyarakat</p>
                <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{ $count_pelayanan }}</span></h2>
                <!-- <p class="m-0">Jan - Apr 2017</p> -->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-custom">
            <i class="mdi mdi-account-multiple widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Pembinaan Hubungan</p>
                <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{ $count_hubungan }}</span></h2>
                <!-- <p class="m-0">Jan - Apr 2017</p> -->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-custom">
            <i class="mdi mdi-crown widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Pemberdayaan</p>
                <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{ $count_pemberdayaan }}</span></h2>
                <!-- <p class="m-0">Jan - Apr 2017</p> -->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-custom">
            <i class="mdi mdi-playlist-check widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Regulasi</p>
                <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{ $count_regulasi }}</span></h2>
                <!-- <p class="m-0">Jan - Apr 2017</p> -->
            </div>
        </div>
    </div><!-- end col -->

</div>
@endsection
