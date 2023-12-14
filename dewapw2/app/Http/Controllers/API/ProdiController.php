<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'fakulitas_id' => 'required',
        ]);

        $prodi = Prodi::where('id', $id)->update($validate);
        if ($prodi) {
            $response['success'] = true;
            $response['message'] = $request->nama . ' berhasil diperbarui.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = $request->nama . ' Gagal diPerbaharui.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $prodi = Prodi::where('id', $id);
        if (count($prodi->get()) > 0) {
            $mahasiswa = Mahasiswa::where('mahasiswa_id', $id)->get();
            if (count($mahasiswa)) {
                $response['success'] = false;
                $response['message'] = 'Data Prodi tidak diizinkan dihapus dikarenakan digunakan ditabel prodi.';
                return response()->json($response, Response::HTTP_NOT_FOUND);
            } else {
                $prodi->delete();
                $response['success'] = true;
                $response['message'] = 'Prodi berhasil dihapus.';
                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Prodi tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
