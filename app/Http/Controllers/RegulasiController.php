<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Regulasi;

class RegulasiController extends AdminController
{
    public function __construct(Regulasi $model)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->view = 'regulasi.';
    }
    public function index(){
        return view($this->view.'index',[
            'models'=>$this->model->orderBy('id','desc')->get()
        ]);
    }
    public function create(){
        return view($this->view.'create');
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            $inputs['document']  = $this->upload_file($inputs,$this->model,$request,'document','regulasi/document');
            $this->model->create($inputs);
            return redirect('regulasi')->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            return redirect('regulasi')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        return view($this->view.'edit',[
            'model' => $this->model->findOrFail($id),
        ]);
    }
    public function update(Request $request,$id){
        $inputs = $request->all();
        try{
            if(isset($inputs['document'])){
                $inputs['document']  = $this->upload_file($inputs,$this->model,$request,'document','regulasi/document');
            }
            $this->model->findOrFail($id)->update($inputs);
            return redirect('regulasi')->with('success', 'Data berhasil diupdate.');
        }catch(\Exception $e){
            return redirect('regulasi')->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            $model->delete();
            return redirect('regulasi')->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            return redirect('regulasi')->with('error', $e->getMessage());
        }
    }
}
