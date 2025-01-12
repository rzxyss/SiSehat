<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class GajiController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::with('dokter')->get();
        $title = 'Daftar Gaji Dokter';
        return view('admin.gaji.index', compact('gaji', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Gaji';
        $dokter = User::where('role','=','dokter')->get();
        return view('admin.gaji.create', compact('title', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dokter' => 'required',
            'tanggal_ambil' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        $gaji = Gaji::create([
            'id_dokter' => $request->input('dokter'),
            'tanggal_ambil' => $request->input('tanggal_ambil'),
            'gaji' => $request->input('gaji'),
        ]);

        if ($gaji) {
            return redirect()->route('dashboard.gaji.index')->with('message', 'Data Gaji Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.gaji.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Data Gaji!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gaji = Gaji::findOrFail($id);
        $dokter = User::where('role','=','dokter')->get();
        $title = 'Edit Data Gaji';

        return view('admin.gaji.edit', compact('gaji', 'dokter', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'dokter' => 'required',
            'tanggal_ambil' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        $gaji = Gaji::findOrFail($id);

        $gaji->update([
            'id_dokter' => $request->input('dokter'),
            'tanggal_ambil' => $request->input('tanggal_ambil'),
            'gaji' => $request->input('gaji'),
        ]);

        if ($gaji) {
            return redirect()->route('dashboard.gaji.index')->with('message', 'Data Gaji Berhasil Diperbarui!');
        } else {
            return redirect()->route('dashboard.gaji.edit', $id)->with('error', 'Terjadi Kesalahan Saat Memperbarui Data Gaji!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();
        return redirect()->route('dashboard.gaji.index')->with('message', 'Data Gaji Berhasil Dihapus!');
    }
}
