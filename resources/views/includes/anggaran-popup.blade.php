<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Edit Anggaran</h4>
</div>
<div class="modal-body">
 {{ csrf_field() }}
  <input id="masterId" name="masterId" value="{{ isset($model) ? $model->id:null }}" type="text" hidden>
  <div class="form-group">
      <label class="control-label">Kode</label>
      <input id="kode" name="kode" type="text" class="form-control" value="{{ isset($model) ? $model->kode:null }}" required>
  </div>
  <div class="form-group">
      <label class="control-label">Title Jenis</label>
      <input id="title" type="text" class="form-control" value="{{ isset($model) ? $model->title:null }}" disabled>
  </div>
  <div class="form-group">
      <label class="control-label">Anggaran</label>
      <input id="anggaran" name="anggaran" type="number" class="form-control" value="{{ isset($model) ? $model->anggaran:null }}" required>
  </div>
</div>
<div class="modal-footer">
  <button type="submit" id="submitAnggaran" class="btn btn-primary" {{ $model->kode == '' ? 'disabled':null }}>Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
