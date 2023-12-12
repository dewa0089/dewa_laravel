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
        Mahasiswa::create($validate);
        $response['success'] = true;
        $response['message'] = 'Prodi Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
