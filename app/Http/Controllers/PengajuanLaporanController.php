<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\PengajuanLaporan;
use App\Models\RevisiLaporan;
use Redirect;

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
  public function downloadDMR($id)
  {
      $laporan = $this->model->findOrFail($id);
      $path    = $laporan->judul_laporan.' - '.date('d F Y', strtotime($laporan->created_at));
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      // Adding an empty Section to the document...
      $section = $phpWord->addSection();
      // Adding Text element to the Section having font styled by default...
      $section->addText($laporan->dmr_cover.$laporan->dmr_bab_1.$laporan->dmr_bab_2.$laporan->dmr_bab_3.$laporan->dmr_bab_4);
      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
      try {
          $objWriter->save(public_path('laporan/'.$path.' DMR.html'));
      }catch (Exception $e) {
        return redirect('pengajuan-laporan')->with('error', 'Gagal mendownload data : '.$e->getMessage());
      }
      return Redirect::away(url('laporan/'.$path.' DMR.html'));
  }
  public function downloadTOR($id)
  {
      $laporan = $this->model->findOrFail($id);
      $path    = $laporan->judul_laporan.' - '.date('d F Y', strtotime($laporan->created_at));
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      // Adding an empty Section to the document...
      $section = $phpWord->addSection();
      // Adding Text element to the Section having font styled by default...
      $section->addText($laporan->tor_cover.$laporan->tor_laporan);
      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
      try {
        $objWriter->save(public_path('laporan/'.$path.' TOR.html'));
      }catch (Exception $e) {
        return redirect('pengajuan-laporan')->with('error', 'Gagal mendownload data : '.$e->getMessage());
      }
      return Redirect::away(url('laporan/'.$path.' TOR.html'));
  }
}
