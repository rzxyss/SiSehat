@extends('layouts.home')
@section('home')
<div class="min-h-screen bg-gradient-to-br bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
        <!-- Info Section -->
        <div class="md:w-1/2 bg-white rounded-2xl shadow-lg p-8 h-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">BMI Kalkulator</h1>
            <p class="text-gray-600 leading-relaxed">
                Berat badan ideal adalah impian semua orang. Tidak hanya memiliki bentuk tubuh yang menunjang
                penampilan,
                berat badan ideal juga menandakan kondisi tubuh yang sehat. Bagaimana denganmu? Yuk, hitung sekarang di
                BMI
                Kalkulator.
            </p>
        </div>

        <!-- Calculator Section -->
        <div class="md:w-1/2 bg-white rounded-2xl shadow-lg p-8">
            @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('bmi.hitung') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="tinggi" class="block text-gray-700 font-semibold mb-2">Tinggi Badan (cm)</label>
                    <input type="number" name="tinggi" id="tinggi" value="{{ old('tinggi') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition duration-200">
                </div>
                <div>
                    <label for="berat" class="block text-gray-700 font-semibold mb-2">Berat Badan (kg)</label>
                    <input type="number" name="berat" id="berat" value="{{ old('berat') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition duration-200">
                </div>
                <button type="submit"
                    class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-shade1 transform hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Hitung BMI
                </button>
            </form>

            @isset($bmi)
            <div class="mt-8 p-6 bg-blue-50 rounded-xl">
                <p class="text-xl text-center text-gray-800">
                    BMI Kamu: <span class="font-bold text-primary">{{ number_format($bmi, 1) }}</span>
                </p>
                <p class="text-xl text-center text-gray-800 mt-2">
                    Kategori: <span class="font-bold text-primary">{{ $kategori }}</span>
                </p>
                <p class="text-xl text-center text-gray-800 mt-2">
                    Saran: <span class="font-bold text-primary">{{ $saran }}</span>
                </p>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection