<?php

namespace App\Http\Controllers;

use App\Models\Fakulitas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fakulitas = Fakulitas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $grafik_mhs = DB::select("SELECT prodis.nama, COUNT(*) as jumlah FROM `prodis`
JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id
GROUP BY prodis.nama;");
        $grafik_jk_prodi = DB::select("SELECT prodis.nama, SUM(CASE WHEN mahasiswas.jk = 'L' THEN 1 ELSE 0 END) as laki, SUM(CASE WHEN mahasiswas.jk = 'P' THEN 1 ELSE 0 END) as perempuan FROM prodis JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id GROUP BY prodis.nama;");
        $pie_mhs = DB::select("SELECT mahasiswas.jk, COUNT(*) as jumlah FROM `mahasiswas` GROUP BY jk;");
        return view('home')->with('fakulitas', $fakulitas)->with('prodi', $prodi)->with('mahasiswa', $mahasiswa)->with('grafik_mhs', $grafik_mhs)->with('pie_mhs', $pie_mhs)->with('grafik_jk_prodi', $grafik_jk_prodi);
    }
}
