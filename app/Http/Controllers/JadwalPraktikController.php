<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class JadwalPraktikController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jadwal Praktik';
        if (Auth::user()->role == 'admin') {
            $jadwal = JadwalPraktik::all();
        } else {
            $jadwal = JadwalPraktik::where('id_dokter', '=', Auth::user()->id);
        }
        return view('admin.jadwal.index', compact('jadwal', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Jadwal Praktik';
        $dokter = User::where('role', '=', 'dokter')->get();
        return view('admin.jadwal.create', compact('title', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dokter' => 'required',

        ]);

        $jadwal = JadwalPraktik::create([
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'id_dokter' => $request->input('dokter'),
        ]);

        if ($jadwal) {
            return redirect()->route('dashboard.jadwal.index')->with('message', 'Jadwal Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.jadwal.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan jadwal!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = JadwalPraktik::findOrFail($id);
        $dokter = User::where('role', '=', 'dokter')->get();
        $title = 'Update Jadwal';

        return view('admin.jadwal.edit', compact('jadwal', 'title', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dokter' => 'required',

        ]);
        $jadwal = JadwalPraktik::findOrFail($id);

        $jadwal->update([
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'id_dokter' => $request->input('dokter'),
        ]);

        if ($jadwal) {
            return redirect()->route('dashboard.jadwal.index')->with('message', 'Jadwal Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.jadwal.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan jadwal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalPraktik::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('dashboard.jadwal.index');
    }
}
