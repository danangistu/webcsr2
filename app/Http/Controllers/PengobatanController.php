<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Kesehatan;
use App\Models\KesehatanPengobatan;
use DB;

class PengobatanController extends AdminController
{
    public function __construct(Kesehatan $kesehatan, KesehatanPengobatan $obat)
    {
        $this->middleware('auth');
        $this->model = $obat;
        $this->kesehatan = $kesehatan;
        $this->view = 'pengobatan.';
    }
    public function index($id){
        return view($this->view.'index',[
            'models'=>$this->model->where('kesehatan_id','=',$id)->orderBy('id','desc')->get(),
            'kesehatan_id'=>$id
        ]);
    }
    public function create($id)
    {
        return view($this->view.'create',[
            'kesehatan_id'=>$id
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            $anggaran = $this->kesehatan->findOrFail($inputs['kesehatan_id']);
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            $this->model->create($inputs);
            DB::commit();
            return redirect('kesehatan/pengobatan/'.$inputs['kesehatan_id'])->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('kesehatan/pengobatan/'.$inputs['kesehatan_id'])->with('error', $e->getMessage());
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
            $anggaran = $this->kesehatan->findOrFail($inputs['kesehatan_id']);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->anggaran = $anggaran->anggaran+$inputs['anggaran'];
            $anggaran->save();
            $model->update($inputs);
            DB::commit();
            return redirect('kesehatan/pengobatan/'.$inputs['kesehatan_id'])->with('success', 'Data berhasil diedit.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('kesehatan/pengobatan/'.$inputs['kesehatan_id'])->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            DB::beginTransaction();
            $anggaran = $this->kesehatan->findOrFail($model->kesehatan_id);
            $anggaran->anggaran = $anggaran->anggaran-$model->anggaran;
            $anggaran->save();
            $model->delete();
            DB::commit();
            return redirect('kesehatan/pengobatan/'.$model['kesehatan_id'])->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('kesehatan/pengobatan/'.$model['kesehatan_id'])->with('error', $e->getMessage());
        }
    }
}
