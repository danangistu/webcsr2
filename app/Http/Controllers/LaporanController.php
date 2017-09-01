<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Kode;
use App\Models\Sarana;
use App\Models\Kesehatan;
use App\Models\Pendidikan;
use App\Models\Bencana;
use App\Models\Komunikasi;
use App\Models\HariBesar;
use App\Models\Kegiatan;
use App\Models\Modal;
use App\Models\Ketrampilan;
use App\Models\Pemasaran;
use App\Models\Riset;

class LaporanController extends AdminController
{
    public function __construct(Kode $model)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->view = 'laporan.';
    }
    public function index(){
        $kodes = $this->model->orderBy('id','desc')->get();
        $model = [];
        $total = [];
        $year = date('Y');
        foreach($kodes as $kode){
            $count1 = Sarana::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count2 = Kesehatan::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count3 = Pendidikan::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count4 = Bencana::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count5 = Komunikasi::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count6 = HariBesar::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count7 = Kegiatan::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count8 = Modal::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count9 = Ketrampilan::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count10 = Pemasaran::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $count11 = Riset::where([['kode','=',$kode->kode],['tahun','=',$year],])->sum('anggaran');
            $tahun  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;

            $count1 = Sarana::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count2 = Kesehatan::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count3 = Pendidikan::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count4 = Bencana::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count5 = Komunikasi::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count6 = HariBesar::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count7 = Kegiatan::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count8 = Modal::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count9 = Ketrampilan::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count10 = Pemasaran::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $count11 = Riset::where([['kode','=',$kode->kode],['tahun','=',$year-1],])->sum('anggaran');
            $tahun1  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;

            $count1 = Sarana::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count2 = Kesehatan::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count3 = Pendidikan::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count4 = Bencana::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count5 = Komunikasi::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count6 = HariBesar::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count7 = Kegiatan::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count8 = Modal::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count9 = Ketrampilan::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count10 = Pemasaran::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $count11 = Riset::where([['kode','=',$kode->kode],['tahun','=',$year-2],])->sum('anggaran');
            $tahun2  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;

            $count1 = Sarana::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count2 = Kesehatan::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count3 = Pendidikan::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count4 = Bencana::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count5 = Komunikasi::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count6 = HariBesar::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count7 = Kegiatan::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count8 = Modal::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count9 = Ketrampilan::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count10 = Pemasaran::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $count11 = Riset::where([['kode','=',$kode->kode],['tahun','=',$year-3],])->sum('anggaran');
            $tahun3  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;

            $count1 = Sarana::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count2 = Kesehatan::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count3 = Pendidikan::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count4 = Bencana::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count5 = Komunikasi::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count6 = HariBesar::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count7 = Kegiatan::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count8 = Modal::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count9 = Ketrampilan::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count10 = Pemasaran::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $count11 = Riset::where([['kode','=',$kode->kode],['tahun','=',$year-4],])->sum('anggaran');
            $tahun4  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;

            $model = array_prepend($model,['kode'=>$kode->kode,'title'=>$kode->title,'tahun'=>$tahun,'tahun1'=>$tahun1,'tahun2'=>$tahun2,'tahun3'=>$tahun3,'tahun4'=>$tahun4]);
        }

        for($i=$year;$i>=$year-3;$i--){
          $count1 = Sarana::where('tahun','=',$i)->sum('anggaran');
          $count2 = Kesehatan::where('tahun','=',$i)->sum('anggaran');
          $count3 = Pendidikan::where('tahun','=',$i)->sum('anggaran');
          $count4 = Bencana::where('tahun','=',$i)->sum('anggaran');
          $count5 = Komunikasi::where('tahun','=',$i)->sum('anggaran');
          $count6 = HariBesar::where('tahun','=',$i)->sum('anggaran');
          $count7 = Kegiatan::where('tahun','=',$i)->sum('anggaran');
          $count8 = Modal::where('tahun','=',$i)->sum('anggaran');
          $count9 = Ketrampilan::where('tahun','=',$i)->sum('anggaran');
          $count10 = Pemasaran::where('tahun','=',$i)->sum('anggaran');
          $count11 = Riset::where('tahun','=',$i)->sum('anggaran');
          $tahun  = $count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8+$count9+$count10+$count11;
          $total = array_prepend($total,$tahun);
        }
        return view($this->view.'index',[
            'kodes'=>$kodes,
            'models'=>$model,
            'year'=>$year,
            'total'=>$total,
        ]);
    }
}
