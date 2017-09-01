<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Riset;
use App\Models\RisetRoadmap;
use DB;

class RisetRoadmapController extends AdminController
{
    public function __construct(Riset $riset, RisetRoadmap $roadmap)
    {
        $this->middleware('auth');
        $this->model = $roadmap;
        $this->riset = $riset;
        $this->view = 'riset-roadmap.';
    }
    public function index($id){
        return view($this->view.'index',[
            'models'=>$this->model->where('riset_id','=',$id)->orderBy('id','desc')->get(),
            'riset_id'=>$id
        ]);
    }
    public function create($id)
    {
        return view($this->view.'create',[
            'riset_id'=>$id
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            $anggaran = $this->riset->findOrFail($inputs['riset_id']);
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','riset/foto');
            $this->model->create($inputs);
            DB::commit();
            return redirect('riset/roadmap/'.$inputs['riset_id'])->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset/roadmap/'.$inputs['riset_id'])->with('error', $e->getMessage());
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
            $anggaran = $this->riset->findOrFail($inputs['riset_id']);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            if(isset($inputs['foto']))
                $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','riset/foto');
            $model->update($inputs);
            DB::commit();
            return redirect('riset/roadmap/'.$inputs['riset_id'])->with('success', 'Data berhasil diedit.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset/roadmap/'.$inputs['riset_id'])->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            DB::beginTransaction();
            $anggaran = $this->riset->findOrFail($model->riset_id);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->save();
            $model->delete();
            DB::commit();
            return redirect('riset/roadmap/'.$model['riset_id'])->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('riset/roadmap/'.$model['riset_id'])->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        return view($this->view.'view',[
            'model' => $this->model->findOrFail($id),
        ]);
    }
}
