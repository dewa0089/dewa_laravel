<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakulitas;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FakulitasController extends Controller
{
    public function index()
    {
        $fakulitas = Fakulitas::all();
        return response()->json($fakulitas, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:fakulitas'
        ]);
        Fakulitas::create($validate);
        $response['success'] = true;
        $response['message'] = 'Fakultas Berhasil Disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
