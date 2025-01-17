<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AkunController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = User::all();
        $title = 'Akun';
        return view('admin.akun.index', compact('akun', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Akun';
        return view('admin.akun.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'alamat' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'spesialis' => 'nullable',
            'password' => ['required', Rules\Password::defaults()],
            'role' => 'required'
        ]);


        $akun = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'username' => $request->input('username'),
            'telp' => $request->input('telp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'spesialis' => $request->input('spesialis'),
            'tanggal_lahir' => Carbon::parse($request->input('tanggal_lahir'))->format('Y-m-d'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role')
        ]);
        if ($akun) {
            return redirect()->route('dashboard.akun.index')->with('message', 'akun Berhasil Ditambahkan!');
        } else {
            return redirect()->route('dashboard.akun.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan akun!');
        }
    }

    public function edit(string $id)
    {
        $akun = User::findOrFail($id);
        $title = 'Update Akun';
        return view('admin.akun.edit', compact('akun', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'alamat' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'spesialis' => 'nullable',
            'password' => ['nullable', 'string'],
            'role' => 'required'
        ]);

        $akun = User::findOrFail($id);

        if ($request->input('password') != null) {
            $akun->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'username' => $request->input('username'),
                'no_telp' => $request->input('telp'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'spesialis' => $request->input('spesialis'),
                'tanggal_lahir' => Carbon::parse($request->input('tanggal_lahir'))->format('Y-m-d'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role')
            ]);
            if ($akun) {
                return redirect()->route('dashboard.akun.index')->with('message', 'akun Berhasil Ditambahkan!');
            } else {
                return redirect()->route('dashboard.akun.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan akun!');
            }
        } else {
            $akun->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'username' => $request->input('username'),
                'no_telp' => $request->input('telp'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'spesialis' => $request->input('spesialis'),
                'tanggal_lahir' => Carbon::parse($request->input('tanggal_lahir'))->format('Y-m-d'),
                'role' => $request->input('role')
            ]);
            if ($akun) {
                return redirect()->route('dashboard.akun.index')->with('message', 'akun Berhasil Ditambahkan!');
            } else {
                return redirect()->route('dashboard.akun.tambah')->with('error', 'Terjadi Kesalahan Saat Menambahkan akun!');
            }
        }
    }

    public function destroy(string $id)
    {
        $akun = User::findOrFail($id);
        $akun->delete();
        return redirect()->route('dashboard.akun.index');
    }
}
