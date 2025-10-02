<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $data_buku = Buku::all();

        return view('buku.index', compact('data_buku'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;  
        $buku->save();

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/buku')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('success', 'Buku berhasil dihapus');
    }
}