@extends('layouts.default')
@section('title')Create Bantuan Bencana Alam @endsection

@push('javascript')
<script src="{{ url('admin') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<script src="{{ url('admin') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
@endpush
@section('content')
<?php $path = 'bencana' ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('bencana') }}">Bantuan Bencana Alam</a>
                    </li>
                    <li class="active">
                        Tambah Data
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Bantuan Bencana Alam</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Bantuan Bencana Alam</h3>
            </div>
            <div class="panel-body">
              <form id="default-wizard" action="{{ url('bencana') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <fieldset title="1">
                      <legend>Description</legend>
                      <div class="row m-t-20">
                        @include('form.description')
                      </div>
                  </fieldset>

                  <fieldset title="2">
                      <legend>Timeline</legend>
                      <div class="row m-t-20">
                        @include('form.timeline')
                      </div>
                  </fieldset>

                  <fieldset title="3">
                      <legend>Document</legend>
                      <div class="row m-t-20">
                        @include('form.document2')
                      </div>
                  </fieldset>

                  <fieldset title="4">
                      <legend>Latar Belakang</legend>
                      <div class="row m-t-20">
                        @include('form.latar_belakang')
                      </div>
                  </fieldset>

                  <fieldset title="5">
                      <legend>Evaluasi</legend>
                      <div class="row m-t-20">
                        @include('form.evaluasi')
                      </div>
                  </fieldset>

                  <fieldset title="6">
                      <legend>Submit</legend>
                      <div class="row m-t-20">
                        @include('form.submit')
                      </div>
                  </fieldset>

                  <button type="submit" class="btn btn-primary stepy-finish">Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
