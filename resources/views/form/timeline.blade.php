<div class="col-md-12">
  @php($bulans = ['jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des'])
  @foreach($bulans as $bulan)
      <div class="form-group">
          <label class="control-label">{{ ucwords($bulan) }}</label>
          <textarea class="form-control" name="{{ $bulan }}" rows="2">{{ isset($timeline->$bulan) ? $timeline->$bulan:null }}</textarea>
      </div>
  @endforeach
</div>
