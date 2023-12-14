<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi.fakulitas')->get();
        return response()->json($mahasiswa, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tmpt_lahir" => "required",
            "tgl_lahir" => "required",
            "foto" => "required|image",
            "prodi_id" => "required",

        ]);
        // ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        // Rename file foto menjadi npm.extensi (cth: 2226250101.png)
        $validate["foto"] = $request->npm . "." . $ext;
        //upload file foto ke dalam folder public/foto
        $request->foto->move(public_path('foto'), $validate['foto']);
        //simpan data ke tabel mahasiswas
        // Mahasiswa::create($validasi);
        // return redirect("mahasiswa")->with("success", "Data Fakulitas berhasil disimpan");
        Mahasiswa::create($validate);
        $response['success'] = true;
        $response['message'] = 'Mahasiswa ' . $request->nama . ' Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
