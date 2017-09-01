<div class="col-md-12">
    <div class="form-group">
        <label class="control-label">Tahun</label>
        <input type="number" name="tahun" class="form-control" value="{{ isset($model->tahun) ? $model->tahun:null }}" placeholder="Tahun" min="2000">
    </div>
    <div class="form-group">
        <label class="control-label">Tempat</label>
        <input type="text" name="tempat" class="form-control" value="{{ isset($model->tempat) ? $model->tempat:null }}" placeholder="Tempat">
    </div>
    <div class="form-group">
        <label class="control-label">Latar Belakang Kegiatan</label>
        <textarea class="form-control" name="kerjasama" rows="5">{{ isset($model->kerjasama) ? $model->kerjasama:null }}</textarea>
    </div>
</div>
