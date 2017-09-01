<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\PengajuanLaporan;
use App\Models\RevisiLaporan;

class PengajuanLaporanController extends AdminController
{
  public function __construct(PengajuanLaporan $model)
  {
      $this->middleware('auth');
      $this->model = $model;
      $this->view = 'pengajuan-laporan.';
  }
  public function index()
  {
      return view($this->view.'index',[
          'models'=>$this->model->orderBy('created_at','desc')->where('user_id',auth()->user()->id)->get(),
      ]);
  }
  public function getRevisi($id)
  {
      return view($this->view.'revisi',[
          'models'=>RevisiLaporan::where('laporan_id',$id)->get(),
      ]);
  }
  public function getRevisiFix($id)
  {
      $revisi = RevisiLaporan::findOrFail($id);
      $revisi->status = 'fixed';
      $revisi->save();

      $model = $this->model->findOrFail($revisi->laporan_id);
      if($model->approval_sps !== 'approve')
        $model->approval_sps = 'pending';
      else
        $model->approval_gm = 'pending';
      $model->save();

      return redirect('pengajuan-laporan')->with('success', 'Revisi telah diajukan.');
  }
}
