<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\User;

class ProfileController extends AdminController
{
  public function __construct(User $model)
  {
      $this->middleware('auth');
      $this->model = $model;
      $this->view = 'user.form';
  }
  public function index(){
      return view($this->view,[
        'model' => auth()->user(),
      ]);
  }
  public function store(Request $request){
      $inputs = $request->all();
      $model = $this->model->findOrFail($inputs['id']);
      try{
          if($inputs['password'] !== ''){
            $inputs['image'] = isset($inputs['image']) ? $this->upload_file($inputs,$model,$request,'image',''):$model->image;
            $inputs['password'] = bcrypt($inputs['password']);
            $model->update($inputs);
          }else{
            $inputs['image'] = isset($inputs['image']) ? $this->upload_file($inputs,$model,$request,'image',''):$model->image;
            $model->update(array_except($inputs, ['password']));
          }
          return redirect('profile')->with('success', 'Profil berhasil diubah.');
      }catch(\Exception $e){
          return redirect('profile')->with('error', $e->getMessage());
      }
  }
}
