<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class JanjiTemuController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $janjiTemu = JanjiTemu::with(['pasien', 'dokter'])->get();
        $title = 'Daftar Janji Temu';
        return view('admin.janji.index', compact('janjiTemu', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Buat Janji Temu Baru';
        $pasien = User::where('role', '=', 'pasien')->get();
        $dokter = User::where('role', '=', 'dokter')->get();
        return view('admin.janji.create', compact('title', 'pasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_temu' => 'required|date',
            'jam_temu' => 'required',
            'id_pasien' => 'required|exists:users,id',
            'id_dokter' => 'required|exists:users,id',
            'status' => 'required|in:0,1,2,3',
            'alasan' => 'nullable|string',
        ]);

        $janjiTemu = JanjiTemu::create($request->only([
            'tanggal_temu',
            'jam_temu',
            'id_pasien',
            'id_dokter',
            'status',
            'alasan',
        ]));

        if ($janjiTemu) {
            return redirect()->route('dashboard.janji.index')->with('message', 'Janji Temu Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.janji.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Janji Temu!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $janjiTemu = JanjiTemu::with(['pasien', 'dokter'])->findOrFail($id);
        $title = 'Detail Janji Temu';
        return view('admin.janji.show', compact('janjiTemu', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $janjiTemu = JanjiTemu::findOrFail($id);
        $pasien = User::where('role', '=', 'pasien')->get();
        $dokter = User::where('role', '=', 'dokter')->get();
        $title = 'Edit Janji Temu';
        return view('admin.janji.edit', compact('janjiTemu', 'pasien', 'dokter', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tanggal_temu' => 'required|date',
            'jam_temu' => 'required',
            'id_pasien' => 'required|exists:users,id',
            'id_dokter' => 'required|exists:users,id',
            'status' => 'required|in:0,1,2,3',
            'alasan' => 'nullable|string',
        ]);

        $janjiTemu = JanjiTemu::findOrFail($id);
        $janjiTemu->update($request->only([
            'tanggal_temu',
            'jam_temu',
            'id_pasien',
            'id_dokter',
            'status',
            'alasan',
        ]));

        return redirect()->route('dashboard.janji.index')->with('message', 'Janji Temu Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $janjiTemu = JanjiTemu::findOrFail($id);
        $janjiTemu->delete();
        return redirect()->route('dashboard.janji.index')->with('message', 'Janji Temu Berhasil Dihapus!');
    }
}
