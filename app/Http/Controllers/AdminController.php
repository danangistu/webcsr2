<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class AdminController extends Controller
{
    public function upload_file($input,$model,$request,$fieldName,$path){
        $file = $model->$fieldName;
        if (isset($input[$fieldName])){
          if (File::exists('contents/'. $file))
            File::delete('contents/'.$file);

          $file = $request->file($fieldName);
          $destinationPath = 'contents/'.$path.'/';
          $fileName = $file->getClientOriginalName();
          $file->move($destinationPath, $fileName);
          return $fileName;
        }else{
          return '';
        }
    }
    public function format_date($originalDate){
        return $newDate = date("Y-m-d", strtotime($originalDate));
    }
}
