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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Fakulitas $fakulitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakulitas $fakulitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakulitas $fakulitas)
    {
        //
    }
}