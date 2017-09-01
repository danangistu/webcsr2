@extends('layouts.default')
@section('title')Edit Quick Win @endsection

@push('javascript')
<script src="{{ url('admin') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<script src="{{ url('admin') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
@endpush
@section('content')
<?php $path = 'quick-win' ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('quick-win') }}">Quick Win</a>
                    </li>
                    <li class="active">
                        Edit Data
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Quick Win</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Quick Win</h3>
            </div>
            <div class="panel-body">
              {{ Form::model($model, array('route' => array('quick-win.update', $model->id),'id'=>'default-wizard', 'method' => 'PUT')) }}
                  {{ csrf_field() }}
                  <fieldset title="1">
                      <legend>Tri Wulan I</legend>
                      <div class="row m-t-20">
                        @include('quick.form1')
                      </div>
                  </fieldset>

                  <fieldset title="2">
                      <legend>Tri Wulan II</legend>
                      <div class="row m-t-20">
                        @include('quick.form2')
                      </div>
                  </fieldset>

                  <fieldset title="3">
                      <legend>Tri Wulan III</legend>
                      <div class="row m-t-20">
                        @include('quick.form3')
                      </div>
                  </fieldset>

                  <fieldset title="4">
                      <legend>Tri Wulan IV</legend>
                      <div class="row m-t-20">
                        @include('quick.form4')
                      </div>
                  </fieldset>

                  <button type="submit" class="btn btn-primary stepy-finish">Submit</button>
              {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
