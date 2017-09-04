<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Riset;
use App\Models\RisetRoadmap;
use App\Models\Timeline;
use App\Models\LatarBelakang;
use App\Models\Evaluasi;
use App\Models\LaporanSetting;
use App\Models\PengajuanLaporan;
use DB;

class RisetController extends AdminController
{
    public function __construct(Riset $riset, Timeline $timeline, LatarBelakang $latar, Evaluasi $evaluasi)
    {
        $this->middleware('auth');
        $this->model = $riset;
        $this->timeline = $timeline;
        $this->latar = $latar;
        $this->evaluasi = $evaluasi;
        $this->view = 'riset.';
    }

    public function index(risetRoadmap $roadmap)
    {
        return view($this->view.'index',[
            'models'=>$this->model->orderBy('id','desc')->get(),
            'roadmap'=>$roadmap,
        ]);
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try{
            DB::beginTransaction();
            //Timeline
            $input_timeline = $request->only(['jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des']);
            $timeline_id = $this->timeline->create($input_timeline);

            //latar belakang
            $input_latar = $request->only(['latar_belakang','foto_1','foto_2','foto_3','foto_4','foto_5','foto_6']);
            $input_latar['foto_1'] = $this->upload_file($input,$this->latar,$request,'foto_1','riset/foto');
            $input_latar['foto_2'] = $this->upload_file($input,$this->latar,$request,'foto_2','riset/foto');
            $input_latar['foto_3'] = $this->upload_file($input,$this->latar,$request,'foto_3','riset/foto');
            $input_latar['foto_4'] = $this->upload_file($input,$this->latar,$request,'foto_4','riset/foto');
            $input_latar['foto_5'] = $this->upload_file($input,$this->latar,$request,'foto_5','riset/foto');
            $input_latar['foto_6'] = $this->upload_file($input,$this->latar,$request,'foto_6','riset/foto');
            $latar_id = $this->latar->create($input_latar);
            //evaluasi
            $input_evaluasi = $request->only(['laporan','ringkasan','manfaat','tangg_int','tangg_ext']);
            $evaluasi_id = $this->evaluasi->create($input_evaluasi);

            //riset
            $inputs = $request->only(['timeline_id','latar_belakang_id','evaluasi_id','tempat','kerjasama','doc_kerjasama','doc_anggaran','doc_resiko','doc_tor','doc_laporan','doc_evaluasi','tahun']);
            $inputs['timeline_id'] = $timeline_id->id;
            $inputs['latar_belakang_id'] = $latar_id->id;
            $inputs['evaluasi_id'] = $evaluasi_id->id;
            $inputs['doc_kerjasama'] = $this->upload_file($input,$this->model,$request,'doc_kerjasama','riset/document');
            $inputs['doc_anggaran'] = $this->upload_file($input,$this->model,$request,'doc_anggaran','riset/document');
            $inputs['doc_resiko']  = $this->upload_file($input,$this->model,$request,'doc_resiko','riset/document');
            $inputs['doc_tor']     = $this->upload_file($input,$this->model,$request,'doc_tor','riset/document');
            $inputs['doc_laporan'] = $this->upload_file($input,$this->model,$request,'doc_laporan','riset/document');
            $inputs['doc_evaluasi']= $this->upload_file($input,$this->model,$request,'doc_evaluasi','riset/document');
            $this->model->create($inputs);
            DB::commit();
            return redirect('riset')->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $model = $this->model->findOrFail($id);
        return view($this->view.'view',[
            'model'=> $model,
            'timeline'=>$this->timeline->where('id','=',$model->timeline_id)->firstOrFail(),
            'latar'=>$this->latar->where('id','=',$model->latar_belakang_id)->firstOrFail(),
            'evaluasi'=>$this->evaluasi->where('id','=',$model->evaluasi_id)->firstOrFail(),
        ]);
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        return view($this->view.'edit',[
            'model'=> $model,
            'timeline'=>$this->timeline->where('id','=',$model->timeline_id)->firstOrFail(),
            'latar'=>$this->latar->where('id','=',$model->latar_belakang_id)->firstOrFail(),
            'evaluasi'=>$this->evaluasi->where('id','=',$model->evaluasi_id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $model = $this->model->findOrFail($id);
        $timeline = $this->timeline->findOrFail($model->timeline_id);
        $latar = $this->latar->findOrFail($model->latar_belakang_id);
        $evaluasi = $this->evaluasi->findOrFail($model->evaluasi_id);
        try{
            DB::beginTransaction();
            //Timeline
            $input_timeline = $request->only(['jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des']);
            $timeline->update($input_timeline);

            //latar belakang
            $input_latar = $request->only(['latar_belakang','foto_1','foto_2','foto_3','foto_4','foto_5','foto_6']);
            $input_latar['foto_1'] = isset($input->foto_1) ? $this->upload_file($input,$this->latar,$request,'foto_1','riset/foto'):$latar->foto_1;
            $input_latar['foto_2'] = isset($input->foto_2) ? $this->upload_file($input,$this->latar,$request,'foto_2','riset/foto'):$latar->foto_2;
            $input_latar['foto_3'] = isset($input->foto_3) ? $this->upload_file($input,$this->latar,$request,'foto_3','riset/foto'):$latar->foto_3;
            $input_latar['foto_4'] = isset($input->foto_4) ? $this->upload_file($input,$this->latar,$request,'foto_4','riset/foto'):$latar->foto_4;
            $input_latar['foto_5'] = isset($input->foto_5) ? $this->upload_file($input,$this->latar,$request,'foto_5','riset/foto'):$latar->foto_5;
            $input_latar['foto_6'] = isset($input->foto_6) ? $this->upload_file($input,$this->latar,$request,'foto_6','riset/foto'):$latar->foto_6;
            $latar->update($input_latar);
            //evaluasi
            $input_evaluasi = $request->only(['laporan','ringkasan','manfaat','tangg_int','tangg_ext']);
            $evaluasi->update($input_evaluasi);

            //riset
            $inputs = $request->only(['tempat','kerjasama','doc_kerjasama','doc_anggaran','doc_resiko','doc_tor','doc_laporan','doc_evaluasi','tahun']);
            $inputs['doc_kerjasama'] = isset($input->doc_kerjasama) ? $this->upload_file($input,$this->model,$request,'doc_kerjasama','riset/document'):$model->doc_kerjasama;
            $inputs['doc_anggaran'] = isset($input->doc_anggaran) ? $this->upload_file($input,$this->model,$request,'doc_anggaran','riset/document'):$model->doc_anggaran;
            $inputs['doc_resiko']  = isset($input->doc_resiko) ? $this->upload_file($input,$this->model,$request,'doc_resiko','riset/document'):$model->doc_resiko;
            $inputs['doc_tor']     = isset($input->doc_tor) ? $this->upload_file($input,$this->model,$request,'doc_tor','riset/document'):$model->doc_tor;
            $inputs['doc_laporan'] = isset($input->doc_laporan) ? $this->upload_file($input,$this->model,$request,'doc_laporan','riset/document'):$model->doc_laporan;
            $inputs['doc_evaluasi']= isset($input->doc_evaluasi) ? $this->upload_file($input,$this->model,$request,'doc_evaluasi','riset/document'):$model->doc_evaluasi;
            $model->update($inputs);
            DB::commit();
            return redirect('riset')->with('success', 'Data berhasil diedit.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        $timeline = $this->timeline->findOrFail($model->timeline_id);
        $latar = $this->latar->findOrFail($model->latar_belakang_id);
        $evaluasi = $this->evaluasi->findOrFail($model->evaluasi_id);
        try{
            DB::beginTransaction();
            $model->delete();
            $timeline->delete();
            $latar->delete();
            $evaluasi->delete();
            DB::commit();
            return redirect('riset')->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset')->with('error', $e->getMessage());
        }
    }
    public function anggaran(Request $request)
    {
      $inputs = $request->all();
      try{
        $model = $this->model->findOrFail($inputs['masterId']);
        if(isset($inputs['anggaran'])){
          $input = $request->only(['kode','anggaran']);
        }else{
          $input = $request->only(['kode']);
        }
        $model->update($input);
        return redirect('riset')->with('success', 'Data berhasil diubah.');
      }catch(\Exception $e){
        return redirect('riset')->with('error', $e->getMessage());
      }
    }
    public function getAnggaran($id)
    {
      try{
        $model = $this->model->select('risets.id','risets.kode','risets.anggaran','kodes.title')
          ->join('kodes','kodes.kode','=','risets.kode')
          ->where('risets.id',$id)->firstOrFail();
        return view('includes.anggaran-popup-false',[
            'model'=> $model
        ]);
      }
      catch(\Exception $e){
        $model = $this->model->findOrFail($id);
        return view('includes.anggaran-popup-false',[
            'model'=> $model
        ]);
      }
    }
    public function getLaporan(Request $request,$id)
    {
        $model  = $this->model->findOrFail($id);
        $lapset = LaporanSetting::firstOrFail();
        return view($this->view.'laporan',[
            'judul'=>$request->judul,
            'model'=> $model,
            'timeline'=>$this->timeline->where('id','=',$model->timeline_id)->firstOrFail(),
            'latar'=>$this->latar->where('id','=',$model->latar_belakang_id)->firstOrFail(),
            'evaluasi'=>$this->evaluasi->where('id','=',$model->evaluasi_id)->firstOrFail(),
            'lapset'=>$lapset,
        ]);
    }
    public function postLaporan(Request $request)
    {
      $inputs = $request->all();
      $model  = new PengajuanLaporan;
      try{
          $model->create($inputs);
          return redirect('pengajuan-laporan')->with('success', 'Data berhasil ditambahkan.');
      }catch(\Exception $e){
          return redirect('pengajuan-laporan')->with('error', $e->getMessage());
      }
    }
}
