<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Privilege;
use App\Models\PrivilegeRole as Role;
use DB;
class PrivilegeController extends AdminController
{
    public function __construct(Privilege $model, Role $role)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->role  = $role;
        $this->view  = 'privilege.';
    }
    public function index(){
        return view($this->view.'index',[
            'models'=>$this->model->orderBy('id','asc')->get()
        ]);
    }
    public function create(){
        return view($this->view.'create');
    }
    public function store(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            $model = $this->model->create($inputs);
            $role = $this->role;
            $role->privilege_id = $model->id;
            $role->save();
            DB::commit();
            return redirect('privilege')->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('privilege')->with('error', $e->getMessage());
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
            $this->model->findOrFail($id)->update($inputs);
            return redirect('privilege')->with('success', 'Data berhasil diupdate.');
        }catch(\Exception $e){
            return redirect('privilege')->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            $model->delete();
            return redirect('privilege')->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            return redirect('privilege')->with('error', $e->getMessage());
        }
    }
    public function role($id){
      $role = $this->role->where('privilege_id',$id)->first();
      return view($this->view.'role',[
          'model' => $role,
      ]);
    }
    public function roleSubmit(Request $request){
        $inputs = $request->all();
        try{
            $this->role->findOrFail($inputs['id'])->update($inputs);
            return redirect('privilege')->with('success', 'Data berhasil diupdate.');
        }catch(\Exception $e){
            return redirect('privilege')->with('error', $e->getMessage());
        }
    }
}
