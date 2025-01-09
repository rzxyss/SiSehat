<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;



class DokterController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = User::where('role', '=', 'dokter')->get();
        return view('admin.dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'alamat' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'spesialis' => 'required',
            'password' => ['required', Rules\Password::defaults()]
        ]);
        
        
        $dokter = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'username' => $request->input('username'),
            'no_telp' => $request->input('telp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'spesialis' => $request->input('spesialis'),
            'tanggal_lahir' => Carbon::parse($request->input('tanggal_lahir'))->format('Y-m-d'),
            'password' => Hash::make($request->input('password')),
            'role' => 'dokter'
        ]);

        if ($dokter) {
            return redirect()->route('dashboard.dokter.index')->with('message', 'dokter Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.dokter.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Dokter!');
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
        $dokter = Dokter::findOrFail($id);

        return view('admin.dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_dokter' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'spesialis' => 'required',
            'jadwal_praktik' => 'required',
            'gaji' => 'required'
        ]);
        
        $dokter = User::findOrFail($id);
        
        $dokter->update([
            'nama_dokter' => $request->input('nama_dokter'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'spesialis' => $request->input('spesialis'),
            'jadwal_praktik' => $request->input('jadwal_praktik'),
            'role' => 'dokter',
            'gaji' => $request->input('gaji')
        ]);

        if ($dokter) {
            return redirect()->route('dashboard.dokter.index')->with('message', 'dokter Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.dokter.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Dokter!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return redirect()->route('dashboard.dokter.index');
    }
}
