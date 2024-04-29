<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;


class BeritaMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.berita.berita',[
            'beritas'=>Berita::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.berita.create',[
            'kategoris'=>Kategori::all()
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
        $validatedData = $request->validate([
            'title'=>'required',
            'kategori_id'=>'required',
            'body'=>'required',
            'image'=>'image|max:2048'
        ]);
        $validatedData['image'] =  Str::replace('uploads/','',$request->file('image')->store('uploads'));
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),80);
        if($request->hasFile('image')){
            $request->file('image')->move(public_path('uploads/'), $request->file('image')->getClientOriginalName());
        }else{
            $path='';
        }        
        Berita::create($validatedData);
        return redirect('/berita-member')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori, $id)
    {
        return view('member.berita.edit',[
            'beritas' => Berita::find($id),
            'kategoris' => Kategori::all()            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'kategori_id'=>'required',
            'body'=>'required',
            'image'=>'image|file|max:2048'
        ]);
        if($request->file('image')){
            $validatedData['image']=$request->file('image')->Store('uploads');
        }
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),80);
        Berita::where('id',$id)->update($validatedData);
        return redirect('/berita-member')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Berita::destroy($id);
        return redirect('/berita-member')->with('pesan','Data berhasil dihapus');
    }
}
