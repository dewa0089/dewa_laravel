<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::with('fakulitas')->get();
        return response()->json($prodi, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:prodis',
            'fakulitas_id' => 'required'

        ]);
        Prodi::create($validate);
        $response['success'] = true;
        $response['message'] = 'Prodi Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
