<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Kode;

class KodeController extends AdminController
{
    public function __construct(Kode $model)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->view = 'kode.';
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
            $this->model->create($inputs);
            return redirect('kode-pendanaan')->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            return redirect('kode-pendanaan')->with('error', $e->getMessage());
        }
    }
    // public function show($id)
    // {
    //     return view($this->view.'view',[
    //         'model' => $this->model->findOrFail($id),
    //     ]);
    // }
    public function edit($id)
    {
        return view($this->view.'edit',[
            'model' => $this->model->findOrFail($id),
        ]);
    }
    public function update(Request $request,$id){
        $inputs = $request->all();
        try{
            $this->model->findOrFail($id)->update($inputs);
            return redirect('kode-pendanaan')->with('success', 'Data berhasil diupdate.');
        }catch(\Exception $e){
            return redirect('kode-pendanaan')->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            $model->delete();
            return redirect('kode-pendanaan')->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            return redirect('kode-pendanaan')->with('error', $e->getMessage());
        }
    }
    public function cekCode($kode){
      try{
          $model = $this->model->where('kode','=',$kode)->firstOrFail();
          return $model->title;
      }catch(\Exception $e){
          return "Kode tidak valid";
      }
    }
}
