@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.jawdal.update', $obat->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama Obat</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama Obat" name="nama_obat" value="{{ $jadwal->nama_jadwal }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Deskripsi</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="deskripsi" cols="30" rows="10" placeholder="Masukan Deskripsi jadwal">{{ $jadwal->deskripsi }}</textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Harga</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Harga jadwal" name="harga" value="{{ $jadwal->harga }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Stok</label>
        <input type="number"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Stok jadwal" name="stok" value="{{ $jadwal->stok }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Kadaluarsa</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="expired" value="{{ $jadwal->expired }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Foto jadwal</label>
        <input type="file"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="foto">
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection