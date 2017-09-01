<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Kesehatan;
use App\Models\Pendidikan;
use App\Models\Bencana;
use App\Models\Komunikasi;
use App\Models\HariBesar;
use App\Models\Kegiatan;
use App\Models\Modal;
use App\Models\Ketrampilan;
use App\Models\Pemasaran;
use App\Models\Riset;
use App\Models\Regulasi;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->view = 'dashboard.index';
        $this->count_pelayanan = Kesehatan::count()+Pendidikan::count()+Bencana::count();
        $this->count_hubungan  = Komunikasi::count()+HariBesar::count()+Kegiatan::count();
        $this->count_pemberdayaan = Modal::count()+Ketrampilan::count()+Pemasaran::count()+Riset::count();
        $this->count_regulasi  = Regulasi::count();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view,[
            'setting' => Setting::firstOrFail(),
            'count_pelayanan' => $this->count_pelayanan,
            'count_hubungan' => $this->count_hubungan,
            'count_pemberdayaan' => $this->count_pemberdayaan,
            'count_pemberdayaan' => $this->count_pemberdayaan,
            'count_regulasi' => $this->count_regulasi,
        ]);
    }
}
