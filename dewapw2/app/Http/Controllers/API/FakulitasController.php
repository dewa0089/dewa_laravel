<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakulitas;
use App\Models\Prodi;
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

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
        ]);

        $fakultas = Fakulitas::where('id', $id)->update($validate);
        if ($fakultas) {
            $response['success'] = true;
            $response['message'] = 'Fakultas ' . $request->nama . ' berhasil diperbarui.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = $request->nama . ' Gagal diPerbaharui.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $fakultas = Fakulitas::where('id', $id);
        if (count($fakultas->get()) > 0) {
            $prodi = Prodi::where('fakulitas_id', $id)->get();
            if (count($prodi)) {
                $response['success'] = false;
                $response['message'] = 'Data Fakultas tidak diizinkan dihapus dikarenakan digunakan ditabel prodi.';
                return response()->json($response, Response::HTTP_NOT_FOUND);
            } else {
                $fakultas->delete();
                $response['success'] = true;
                $response['message'] = 'Fakultas berhasil dihapus.';
                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Fakultas tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
