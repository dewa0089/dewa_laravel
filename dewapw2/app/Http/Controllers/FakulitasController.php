<?php

namespace App\Http\Controllers;

use App\Models\Fakulitas;
use Illuminate\Http\Request;

class FakulitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakulitas = Fakulitas::all();
        return view("fakulitas.index")->with("fakulitas", $fakulitas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fakulitas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // validasi data input
        $validasi = $request->validate([
            "nama" => "required|unique:fakulitas"
        ]);

        //simpan data ke tabel fakulitas
        Fakulitas::create($validasi);

        return redirect("fakulitas")->with("success", "Data Fakulitas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakulitas $fakulitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($fakulitas);
        $fakulitas = Fakulitas::find($id);
        return view('fakulitas.edit')->with('fakulitas', $fakulitas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "nama" => "required"
        ]);
        Fakulitas::find($id)->update($validasi);
        return redirect('fakulitas')->with('success', 'Data Fakultas Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakulitas = Fakulitas::find($id);
        // dd($fakulitas);
        $fakulitas->delete();
        // return response("Data Sudah Berhasil Di Hapus", 200);

        return redirect()->route('fakulitas.index')->with(
            'success',
            'Data telah dihapus.'
        );
    }
}
