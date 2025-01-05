<?php

namespace App\Http\Controllers;

use App\Models\Apoteker;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ApotekerController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apoteker = Apoteker::all();
        return view('admin.apoteker.index', compact('apoteker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.apoteker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_apoteker' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
        ]);
        
        $apoteker = Apoteker::create([
            'nama_apoteker' => $request->input('nama_apoteker'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
        ]);
        
        if ($apoteker) {
            return redirect()->route('dashboard.apoteker.index')->with('message', 'Apoteker Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.apoteker.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Apoteker!');
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
        $apoteker = Apoteker::findOrFail($id);

        return view('admin.apoteker.edit', compact('apoteker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_apoteker' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
        ]);
        $apoteker = Apoteker::findOrFail($id);
        
        $apoteker->update([
            'nama_apoteker' => $request->input('nama_apoteker'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
        ]);
        
        if ($apoteker) {
            return redirect()->route('dashboard.apoteker.index')->with('message', 'Apoteker Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.apoteker.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan Apoteker!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apoteker = Apoteker::findOrFail($id);
        $apoteker->delete();
        return redirect()->route('dashboard.apoteker.index');
    }
}
