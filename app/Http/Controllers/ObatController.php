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
        $obat = Obat::all();
        $title = 'Obat';
        return view('admin.obat.index', compact('obat', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Obat';
        return view('admin.obat.create', compact('title'));
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
            'expired' => 'required',
            'foto' => 'required'
        ]);

        $imageName = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('assets/image/obat'), $imageName);

        $obat = Obat::create([
            'nama_obat' => $request->input('nama_obat'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'stok' => $request->input('stok'),
            'expired' => $request->input('expired'),
            'foto' => $imageName
        ]);

        if ($obat) {
            return redirect()->route('dashboard.obat.index')->with('message', 'Obat Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.obat.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Obat!');
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
        $title = 'Update Obat';

        return view('admin.obat.edit', compact('obat', 'title'));
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
            'expired' => 'required',
            'foto' => 'nullable'
        ]);

        $obat = Obat::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->getClientOriginalExtension();
            $imagePath = public_path('assets/image/obat/' . $obat->foto);
            if (file_exists($imagePath) && !is_dir($imagePath)) {
                unlink($imagePath);
            }
            $request->foto->move(public_path('assets/image/obat'), $imageName);
            $obat->update([
                'nama_obat' => $request->input('nama_obat'),
                'harga' => $request->input('harga'),
                'deskripsi' => $request->input('deskripsi'),
                'stok' => $request->input('stok'),
                'expired' => $request->input('expired'),
                'foto' => $imageName
            ]);
        } else {
            $obat->update([
                'nama_obat' => $request->input('nama_obat'),
                'harga' => $request->input('harga'),
                'deskripsi' => $request->input('deskripsi'),
                'stok' => $request->input('stok'),
                'expired' => $request->input('expired')
            ]);
        }



        if ($obat) {
            return redirect()->route('dashboard.obat.index')->with('message', 'Obat Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.obat.edit')->with('error', 'Terjadi Kesalahan Saat Menambahkan Obat!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $imagePath = public_path('assets/image/obat/' . $obat->foto);
        if (file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        }
        $obat->delete();
        return redirect()->route('dashboard.obat.index');
    }
}
