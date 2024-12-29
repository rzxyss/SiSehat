<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ObatController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat= Obat::all();
        return view('admin.obat.index',compact('obat'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'expired' => 'required'
        ]);

        $obat = Obat::create([
            'nama_obat' => $request->input('nama_obat'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'stok' => $request->input('stok'),
            'expired' => $request->input('expired')
        ]);

        if ($obat) {
            return redirect()->route('obat.index')->with('message', 'Obat Berhasil Ditambahkan!');
        } else {
            return redirect()->route('obat.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Obat!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);

        return view('admin.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'expired' => 'required'
        ]);

        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat' => $request->input('nama_obat'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'stok' => $request->input('stok'),
            'expired' => $request->input('expired')
        ]);

        if ($obat) {
            return redirect()->route('obat.index')->with('message', 'Obat Berhasil Ditambahkan!');
        } else {
            return redirect()->route('obat.edit')->with('error', 'Terjadi Kesalahan Saat Menambahkan Obat!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index');
    }
}
