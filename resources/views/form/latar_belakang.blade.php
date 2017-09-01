  <div class="form-group">
      <label>Ringkasan Kegiatan</label>
      <textarea class="form-control" name="latar_belakang">{{ isset($latar->latar_belakang) ? $latar->latar_belakang:null }}</textarea>
  </div>
  <?php for($i=1; $i<7; $i++){  $foto = 'foto_'.$i;?>
  <div class="form-group">
      <label class="control-label">Dokumentasi {{ $i }}</label>
      <label class="control-label">&nbsp </label>
      @if(isset($latar->$foto))
          <div class=""><img id="output{{$i}}" src="{{ asset('contents/'.$path.'/foto/'.$latar->$foto) }}" alt="{{ $latar->$foto }}" height="200"/></div>
      @else
          <div class=""><img id="output{{$i}}" height="200"/></div>
      @endif
      <input accept="image/*" type="file" name="foto_{{ $i }}" onchange="loadFile{{$i}}(event)">
  </div>
<?php } ?>
@push('javascript')
<script>
    var loadFile1 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output1');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile2 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output2');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile3 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output3');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile4 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output4');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile5 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output5');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    var loadFile6 = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output6');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endpush
