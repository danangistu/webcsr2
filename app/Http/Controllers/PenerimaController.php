<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Pendidikan;
use App\Models\PendidikanPenerima;
use DB;
class PenerimaController extends AdminController
{
    public function __construct(Pendidikan $pendidikan, PendidikanPenerima $penerima)
    {
        $this->middleware('auth');
        $this->model = $penerima;
        $this->pendidikan = $pendidikan;
        $this->view = 'penerima.';
    }
    public function index($id){
        return view($this->view.'index',[
            'models'=>$this->model->where('pendidikan_id','=',$id)->orderBy('id','desc')->get(),
            'pendidikan_id'=>$id
        ]);
    }
    public function create($id)
    {
        return view($this->view.'create',[
            'pendidikan_id'=>$id
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            $inputs['birthdate'] = $this->format_date($inputs['birthdate']);
            $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','pendidikan/foto');
            $anggaran = $this->pendidikan->findOrFail($inputs['pendidikan_id']);
            $anggaran->anggaran = $anggaran->anggaran+$inputs['biaya'];
            $anggaran->save();
            $this->model->create($inputs);
            DB::commit();
            return redirect('pendidikan/penerima/'.$inputs['pendidikan_id'])->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('pendidikan/penerima/'.$inputs['pendidikan_id'])->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        return view($this->view.'edit',[
            'model' => $this->model->findOrFail($id),
            'id' => $id,
        ]);
    }
    public function update(Request $request,$id){
        $inputs = $request->all();
        $model = $this->model->findOrFail($id);
        try{
            DB::beginTransaction();
            $inputs['birthdate'] = $this->format_date($inputs['birthdate']);
            if(isset($inputs['foto']))
                $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','pendidikan/foto');
            $anggaran = $this->pendidikan->findOrFail($inputs['pendidikan_id']);
            $anggaran->anggaran = $anggaran->anggaran-$model->biaya;
            $anggaran->anggaran = $anggaran->anggaran+$inputs['biaya'];
            $anggaran->save();
            $model->update($inputs);
            DB::commit();
            return redirect('pendidikan/penerima/'.$inputs['pendidikan_id'])->with('success', 'Data berhasil diedit.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('pendidikan/penerima/'.$inputs['pendidikan_id'])->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            DB::beginTransaction();
            $anggaran = $this->pendidikan->findOrFail($model->pendidikan_id);
            $anggaran->anggaran = $anggaran->anggaran-$model->biaya;
            $anggaran->save();
            $model->delete();
            DB::commit();
            return redirect('pendidikan/penerima/'.$model['pendidikan_id'])->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
          DB::rollBack();
            return redirect('pendidikan/penerima/'.$model['pendidikan_id'])->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        return view($this->view.'view',[
            'model' => $this->model->findOrFail($id),
        ]);
    }
}
