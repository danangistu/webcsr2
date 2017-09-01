<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Bencana;
use App\Models\BencanaPemberian;
use DB;
class PemberianController extends AdminController
{
    public function __construct(Bencana $bencana, BencanaPemberian $pemberian)
    {
        $this->middleware('auth');
        $this->model = $pemberian;
        $this->bencana = $bencana;
        $this->view = 'pemberian.';
    }
    public function index($id){
        return view($this->view.'index',[
            'models'=>$this->model->where('bencana_id','=',$id)->orderBy('id','desc')->get(),
            'bencana_id'=>$id
        ]);
    }
    public function create($id)
    {
        return view($this->view.'create',[
            'bencana_id'=>$id
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            $anggaran = $this->bencana->findOrFail($inputs['bencana_id']);
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','bencana/foto');
            $this->model->create($inputs);
            DB::commit();
            return redirect('bencana/pemberian/'.$inputs['bencana_id'])->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('bencana/pemberian/'.$inputs['bencana_id'])->with('error', $e->getMessage());
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
            $anggaran = $this->bencana->findOrFail($inputs['bencana_id']);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            if(isset($inputs['foto']))
                $inputs['foto'] = $this->upload_file($inputs,$this->model,$request,'foto','bencana/foto');
            $model->update($inputs);
            DB::commit();
            return redirect('bencana/pemberian/'.$inputs['bencana_id'])->with('success', 'Data berhasil diedit.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('bencana/pemberian/'.$inputs['bencana_id'])->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            DB::beginTransaction();
            $anggaran = $this->bencana->findOrFail($model->bencana_id);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->save();
            $model->delete();
            DB::commit();
            return redirect('bencana/pemberian/'.$model['bencana_id'])->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('bencana/pemberian/'.$model['bencana_id'])->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        return view($this->view.'view',[
            'model' => $this->model->findOrFail($id),
        ]);
    }
}
