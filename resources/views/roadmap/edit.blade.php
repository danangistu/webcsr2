@extends('layouts.default')
@section('title')Edit Roadmap @endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li>
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('modal') }}">Bantuan Pengembangan dan Modal Usaha</a>
                    </li>
                    <li>
                        <a href="{{ url('modal/roadmap/'.$id) }}">Roadmap</a>
                    </li>
                    <li class="active">
                        Edit Data Roadmap
                    </li>
                </ol>
            </div>
            <h4 class="page-title">Roadmap</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Edit Roadmap</h3>
          </div>
          <div class="panel-body">
            <form id="form" action="{{ url('modal/roadmap/edit/'.$model->id) }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="modal_id" value="{{ $model->modal_id }}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label class="control-label">Title</label>
                              <input name="title" type="text" class="form-control" value="{{ isset($model) ? $model->title:null }}" required>
                           </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" required>{{ $model->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Foto</label></br>
                                <img src="{{ url('contents/modal/foto/'.$model->foto) }}" id="output" height="200"/>
                                <input accept="image/*" type="file" name="foto" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label class="control-label">Anggaran</label>
                              <input name="anggaran" type="number" class="form-control" value="{{ isset($model) ? $model->anggaran:null }}" required>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection
