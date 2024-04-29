<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tipe.tipe',[
            'tipes'=>Tipe::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tipe.create',[
            'tipes'=>Tipe::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama'=>'required',
            'deskripsi'=>'required'

        ]);
        Tipe::create($validatedData);
        return redirect('/tipe-dashboard')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show(Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipe $tipe, $id)
    {
        return view('dashboard.tipe.edit',[
            'tipes' => Tipe::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipe $tipe, $id)
    {
        //
        $validatedData = $request->validate([
            'nama'=>'required',
            'deskripsi'=>'required'

        ]);
        Tipe::where('id',$id)->update($validatedData);
        return redirect('/tipe-dashboard')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipe $tipe, $id)
    {
        //
        Tipe::destroy($id);
        return redirect('/tipe-dashboard')->with('pesan','Data berhasil dihapus');
    }

    public function data(Request $request){
        return Tipe::find($request->id)->toJSON();
    }
}
