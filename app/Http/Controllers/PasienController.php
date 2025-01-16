<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{
    use ValidatesRequests;

    public function dashboard()
    {
        return view('pasien.index');
    }

    public function janji_temu(Request $request)
    {
        $status = $request->input('status');
        $status = $request->get('status');
        $query = JanjiTemu::with('dokter', 'pasien');

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        $janji = $query->paginate(10);
        return view('pasien.janji.index', compact('janji'));
    }

    public function create_janji()
    {
        $dokter = User::where('role', '=', 'dokter')->get();
        return view('pasien.janji.create', compact('dokter'));
    }

    public function store_janji(Request $request)
    {

        $this->validate($request, [
            'tanggal_janji' => 'required|date',
            'jam_janji' => 'required',
            'dokter' => 'required|exists:users,id',
        ]);

        $janji = JanjiTemu::create([
            'tanggal_temu' => $request->input('tanggal_janji'),
            'jam_temu' => $request->input('jam_janji'),
            'id_dokter' => $request->input('dokter'),
            'id_pasien' => Auth::user()->id,
            'status' => '0',
            'alasan' => ''
        ]);

        if ($janji) {
            return redirect()->route('pasien.janji.index')->with('message', 'Janji Temu Berhasil Ditambahkan!');
        } else {
            return redirect()->route('pasien.janji.create')->with('message', 'Janji Temu Gagal Ditambahkan!');
        }
    }
}
