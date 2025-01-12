@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.gaji.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Dokter</label>
        <select name="dokter"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0" 
            required>
            <option value="" disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $d)
            <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Ambil</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tanggal_ambil" required>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jumlah Gaji</label>
        <input type="number" step="0.01"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="gaji" placeholder="Masukkan jumlah gaji" required>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection
