<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Setting;

class SettingController extends AdminController
{
    public function __construct(Setting $model)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->view = 'setting.form';
    }
    public function index(){
        return view($this->view,[
            'model'=>$this->model->firstOrFail(),
        ]);
    }
    public function store(Request $request){
        $inputs = $request->all();
        $model = $this->model->firstOrFail();
        try{
            $inputs['logo'] = isset($inputs['logo']) ? $this->upload_file($inputs,$model,$request,'logo',''):$model->logo;
            $inputs['favicon'] = isset($inputs['favicon']) ? $this->upload_file($inputs,$model,$request,'favicon',''):$model->favicon;
            $inputs['bg_login'] = isset($inputs['bg_login']) ? $this->upload_file($inputs,$model,$request,'bg_login',''):$model->bg_login;
            $inputs['dashboard_banner'] = isset($inputs['dashboard_banner']) ? $this->upload_file($inputs,$model,$request,'dashboard_banner',''):$model->dashboard_banner;
            $model->update($inputs);
            return redirect('setting')->with('success', 'Pengaturan berhasil diubah.');
        }catch(\Exception $e){
            return redirect('setting')->with('error', $e->getMessage());
        }
    }
}
