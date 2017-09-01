<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\PengajuanLaporan;
use App\Models\RevisiLaporan;

class LaporanGMController extends AdminController
{
  public function __construct(PengajuanLaporan $model, RevisiLaporan $revisi)
  {
      $this->middleware('auth');
      $this->model  = $model;
      $this->revisi = $revisi;
      $this->view = 'laporan.gm.';
  }
  public function index()
  {
      $model = $this->model->select('pengajuan_laporans.id','judul_laporan','csr_id','type','laporan','pengajuan_laporans.created_at','name','approval_gm')
                ->join('users','users.id','=','pengajuan_laporans.user_id')
                ->orderBy('created_at','desc')->where([['approval_gm','=','pending'],['approval_sps','=','approve'],])->get();
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
        $model->approval_gm = 'revisi';
        $model->save();

        $revisi = $this->revisi;
        $revisi->create($inputs);
        return redirect('laporan-masuk-gm')->with('success', 'Pembaruan disimpan.');
    }catch(\Exception $e){
        return redirect('laporan-masuk-gm')->with('error', $e->getMessage());
    }
  }
  public function approve($id)
  {
      $model = $this->model->findOrFail($id);
      $model->approval_gm = 'approve';
      $model->save();

      return redirect('laporan-masuk-gm')->with('success', 'Pembaruan disimpan.');
  }
}
