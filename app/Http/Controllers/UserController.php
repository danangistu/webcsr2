<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\User;
use App\Models\Privilege;

class UserController extends AdminController
{
    public function __construct(User $model, Privilege $privilege)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->privilege = $privilege;
        $this->view = 'users.';
    }
    public function index(){
        $model = $this->model->select('users.id','users.name','username','email','image','privilege_id','privileges.name as privilege')
          ->join('privileges','privileges.id','=','users.privilege_id')
          ->orderBy('id','desc')->get();
        return view($this->view.'index',[
            'models'=>$model
        ]);
    }
    public function create(){
        return view($this->view.'create',[
          'privileges'=> $this->privilege->all()
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        $model = $this->model;
        try{
            $inputs['image'] = $this->upload_file($inputs,$model,$request,'image','');
            $inputs['password'] = bcrypt($inputs['password']);
            $model->create($inputs);
            return redirect('users')->with('success', 'Data berhasil ditambahkan.');
        }catch(\Exception $e){
            return redirect('users')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        return view($this->view.'edit',[
            'model' => $this->model->findOrFail($id),
            'privileges'=> $this->privilege->all()
        ]);
    }
    public function update(Request $request,$id){
        $inputs = $request->all();
        $model = $this->model->findOrFail($id);
        try{
            if($inputs['password'] !== ''){
              $inputs['image'] = isset($inputs['image']) ? $this->upload_file($inputs,$model,$request,'image',''):$model->image;
              $inputs['password'] = bcrypt($inputs['password']);
              $model->update($inputs);
            }else{
              $inputs['image'] = isset($inputs['image']) ? $this->upload_file($inputs,$model,$request,'image',''):$model->image;
              $model->update(array_except($inputs, ['password']));
            }
            return redirect('users')->with('success', 'Data berhasil diupdate.');
        }catch(\Exception $e){
            return redirect('users')->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        try{
            $model->delete();
            return redirect('user')->with('success', 'Data berhasil dihapus.');
        }catch(\Exception $e){
            return redirect('user')->with('error', $e->getMessage());
        }
    }
}
