<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::get();
        return view('dashboard.layanan.index', [
            'layanan' => $layanan
        ]);
    }
    public function create()
    {
        return view('dashboard.layanan.create');
    }
    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view(
            'dashboard.layanan.edit',
            [
                'layanan' => $layanan
            ]
        );
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required'
        ]);
        Layanan::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nama' => $validatedData['nama'],
                'harga' => $validatedData['harga'],
                'deskripsi' => $validatedData['deskripsi'],
                'status' => $validatedData['status'],
            ]
        );
        if ($request->id) {
            return redirect()->route('layanan')->with('success', 'Success Update Layanan!');
        } else {
            return redirect()->route('layanan')->with('success', 'Success Menambah Layanan!');
        }
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        $layanan->delete();
        return redirect()->route('layanan')->with('success', 'Success Delete Layanan!');
    }
}
