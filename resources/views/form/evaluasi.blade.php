<div class="col-md-12">
  <div class="form-group">
      <label class="control-label">Laporan Kegiatan Pemberdayaan Masyarakat</label>
      <textarea class="form-control" name="laporan">{{ isset($evaluasi->laporan) ? $evaluasi->laporan:null }}</textarea>
  </div>
  <div class="form-group">
      <label class="control-label">Saran</label>
      <textarea class="form-control" name="ringkasan">{{ isset($evaluasi->ringkasan) ? $evaluasi->ringkasan:null }}</textarea>
  </div>
  <div class="form-group">
      <label class="control-label">Manfaat Bantuan</label>
      <textarea class="form-control" name="manfaat">{{ isset($evaluasi->manfaat) ? $evaluasi->manfaat:null }}</textarea>
  </div>
  <div class="form-group">
      <label class="control-label">Tanggapan Pejabat (Internal)</label>
      <textarea class="form-control" name="tangg_int">{{ isset($evaluasi->tangg_int) ? $evaluasi->tangg_int:null }}</textarea>
  </div>
  <div class="form-group">
      <label class="control-label">Tanggapan Pejabat (External)</label>
      <textarea class="form-control" name="tangg_ext">{{ isset($evaluasi->tangg_ext) ? $evaluasi->tangg_ext:null }}</textarea>
  </div>
</div>
