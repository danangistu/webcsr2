<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\LaporanSetting;

class LaporanSettingController extends AdminController
{
    public function __construct(LaporanSetting $model)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->view = 'laporan-setting.form';
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
            $inputs['left_logo'] = isset($inputs['left_logo']) ? $this->upload_file($inputs,$model,$request,'left_logo',''):$model->left_logo;
            $inputs['right_logo'] = isset($inputs['right_logo']) ? $this->upload_file($inputs,$model,$request,'right_logo',''):$model->right_logo;
            $model->update($inputs);
            return redirect('laporan-setting')->with('success', 'Pengaturan laporan berhasil diubah.');
        }catch(\Exception $e){
            return redirect('laporan-setting')->with('error', $e->getMessage());
        }
    }
}
