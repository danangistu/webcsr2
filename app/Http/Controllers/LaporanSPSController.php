<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\PengajuanLaporan;
use App\Models\RevisiLaporan;

class LaporanSPSController extends AdminController
{
  public function __construct(PengajuanLaporan $model, RevisiLaporan $revisi)
  {
      $this->middleware('auth');
      $this->model  = $model;
      $this->revisi = $revisi;
      $this->view = 'laporan.sps.';
  }
  public function index()
  {
      $model = $this->model->select('pengajuan_laporans.id','judul_laporan','csr_id','type','laporan','pengajuan_laporans.created_at','name','approval_sps')
                ->join('users','users.id','=','pengajuan_laporans.user_id')
                ->orderBy('created_at','desc')->where('approval_sps','pending')->get();
      return view($this->view.'index',[
          'models'=>$model,
      ]);
  }
  public function getRevisi($id)
  {
      return view($this->view.'revisi',[
          'id'=>$id,
      ]);
  }
  public function postRevisi(Request $request)
  {
    $inputs = $request->all();
    $model  = $this->model->findOrFail($inputs['laporan_id']);
    try{
        $model->approval_sps = 'revisi';
        $model->save();

        $revisi = $this->revisi;
        $revisi->create($inputs);
        return redirect('laporan-masuk-sps')->with('success', 'Pembaruan disimpan.');
    }catch(\Exception $e){
        return redirect('laporan-masuk-sps')->with('error', $e->getMessage());
    }
  }
  public function approve($id)
  {
      $model = $this->model->findOrFail($id);
      $model->approval_sps = 'approve';
      $model->save();

      return redirect('laporan-masuk-sps')->with('success', 'Pembaruan disimpan.');
  }
}
