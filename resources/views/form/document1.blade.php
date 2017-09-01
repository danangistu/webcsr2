<div class="col-md-12">
  <div class="form-group">
      <label class="control-label">Perjanjian kerjasama dengan Univ/Lembaga</label>
      @if(isset( $model->doc_kerjasama ))<input type="text" class="form-control input-sm" value="{{ $model->doc_kerjasama }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_kerjasama">
  </div>
  <div class="form-group">
      <label class="control-label">Rencana Anggaran Biaya </label>
      @if(isset( $model->doc_anggaran ))<input type="text" class="form-control input-sm" value="{{ $model->doc_anggaran }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_anggaran">
  </div>
  <div class="form-group">
      <label class="control-label">Dokumen Manajemen Resiko  </label>
      @if(isset( $model->doc_resiko ))<input type="text" class="form-control input-sm" value="{{ $model->doc_resiko }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_resiko">
  </div>
  <div class="form-group">
      <label class="control-label">TOR Term Of Reference </label>
      @if(isset( $model->doc_tor ))<input type="text" class="form-control input-sm" value="{{ $model->doc_tor }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_tor">
  </div>
  <div class="form-group">
      <label class="control-label">Laporan Akhir </label>
      @if(isset( $model->doc_laporan ))<input type="text" class="form-control input-sm" value="{{ $model->doc_laporan }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_laporan">
  </div>
  <div class="form-group">
      <label class="control-label">Laporan Evaluasi </label>
      @if(isset( $model->doc_evaluasi ))<input type="text" class="form-control input-sm" value="{{ $model->doc_evaluasi }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_evaluasi">
  </div>
  <div class="form-group">
      <label class="control-label">Absensi </label>
      @if(isset( $model->doc_absensi ))<input type="text" class="form-control input-sm" value="{{ $model->doc_absensi }}" disabled />@endif
      <input accept=".doc, .docx,.pdf" type="file" name="doc_absensi">
  </div>
</div>
