<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
class PasienController extends Controller
{   
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::all();
        return view('admin.pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki_laki,perempuan',
            'no_telp' => 'required',
            'alamat' => 'required',
            'riwayat_alergi' => 'nullable',
            'riwayat_penyakit' => 'nullable'
        ]);

        $pasien = Pasien::create([
            'nama_pasien' => $request->input('nama_pasien'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            'riwayat_alergi' => $request->input('riwayat_alergi'),
            'riwayat_penyakit' => $request->input('riwayat_penyakit')
        ]);

        if ($pasien) {
            return redirect()->route('dashboard.pasien.index')->with('message', 'Pasien Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.pasien.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Pasien!');
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
        $pasien = Pasien::findOrFail($id);

        return view('admin.pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki_laki,perempuan',
            'no_telp' => 'required',
            'alamat' => 'required',
            'riwayat_alergi' => 'nullable',
            'riwayat_penyakit' => 'nullable'
        ]);
        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama_pasien' => $request->input('nama_pasien'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            'riwayat_alergi' => $request->input('riwayat_alergi'),
            'riwayat_penyakit' => $request->input('riwayat_penyakit')
        ]);

        if ($pasien) {
            return redirect()->route('dashboard.pasien.index')->with('message', 'Pasien Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.pasien.edit')->with('error', 'Terjadi Kesalahan Saat Menambahkan Pasien!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('dashboard.pasien.index');
    }
}
