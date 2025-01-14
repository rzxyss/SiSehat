@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.janji.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Temu</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="tanggal_temu" required>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jam Temu</label>
        <input type="time"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="jam_temu" required>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Pasien</label>
        <select name="id_pasien"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            required>
            <option value="" disabled selected>Pilih Pasien</option>
            @foreach ($pasien as $p)
            <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Dokter</label>
        <select name="id_dokter"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            required>
            <option value="" disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $d)
            <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Status</label>
        <select name="status"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            required>
            <option value="" disabled selected>Pilih Status</option>
            <option value="0">Menunggu Persetujuan</option>
            <option value="1">Disetujui</option>
            <option value="2">Ditolak</option>
            <option value="3">Selesai</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Alasan</label>
        <textarea name="alasan"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            rows="4" placeholder="Masukkan alasan jika diperlukan"></textarea>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection
