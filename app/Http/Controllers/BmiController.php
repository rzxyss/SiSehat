<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function index()
    {
        return view('bmi');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'tinggi' => 'required|numeric|min:1',
            'berat' => 'required|numeric|min:1',
        ]);

        $tinggi = $request->input('tinggi');
        $berat = $request->input('berat');

        $bmi = $berat / (($tinggi / 100) ** 2);
    $kategori = '';
    $saran = '';

    if ($bmi < 18.5) {
        $kategori = 'Berat Rendah';
        $idealWeightMin = 18.5 * (($tinggi / 100) ** 2);
        $saran = 'Naikkan berat badan setidaknya ' . number_format($idealWeightMin - $berat, 1) . ' kg untuk mencapai berat ideal.';
    } elseif ($bmi < 24.9) {
        $kategori = 'Berat Ideal';
        $saran = 'Pertahankan pola hidup sehat untuk menjaga berat badan.';
    } elseif ($bmi < 29.9) {
        $kategori = 'Berat Berlebih';
        $idealWeightMax = 24.9 * (($tinggi / 100) ** 2);
        $saran = 'Turunkan berat badan sekitar ' . number_format($berat - $idealWeightMax, 1) . ' kg untuk mencapai berat ideal.';
    } else {
        $kategori = 'Obesitas';
        $idealWeightMax = 24.9 * (($tinggi / 100) ** 2);
        $saran = 'Turunkan berat badan sekitar ' . number_format($berat - $idealWeightMax, 1) . ' kg untuk mencapai berat ideal.';
    }

    return view('bmi', compact('bmi', 'kategori', 'saran'));
    }
}
