<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
Use Excel;
use App\Models\LatarBelakang;
use App\Models\Evaluasi;
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
    public function handleExport($model, $name)
     {
         $model = $model->get();
         foreach ($model as $key => $value) {
             $latar = LatarBelakang::where('id','=',$value->latar_belakang_id)->firstOrFail();
             $evaluasi = Evaluasi::where('id','=',$value->evaluasi_id)->firstOrFail();

             $data[$key]['No'] = $key+1;
             $data[$key]['Tahun'] = $value->tahun ;
             $data[$key]['Tempat'] = $value->tempat ;
             $data[$key]['Latar Belakang'] = $latar->latar_belakang ;
             $data[$key]['Laporan'] = $evaluasi->laporan ;
             $data[$key]['Ringkasan'] = $evaluasi->ringkasan;
             $data[$key]['Manfaat'] = $evaluasi->manfaat;
             $data[$key]['Tanggapan Internal'] = $evaluasi->tangg_int;
             $data[$key]['Tanggapan External'] = $evaluasi->tangg_ext;
             $data[$key]['Anggaran'] = 'Rp. '.number_format($value->anggaran,2,',','.');
             // $data[$key]['Post Date'] = $value->create_on ;
         }

         \Excel::create($name, function($excel)  use($data) {

             $excel->sheet('Sheet 1', function($sheet) use($data)  {

                 $sheet->fromArray($data);

             });
         })->download('xls');
     }
}
