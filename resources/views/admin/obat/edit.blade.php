@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.obat.update', $obat->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama Obat</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama Obat" name="nama_obat" value="{{ $obat->nama_obat }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Deskripsi</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="deskripsi" cols="30" rows="10" placeholder="Masukan Deskripsi Obat">{{ $obat->deskripsi }}</textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Harga</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Harga Obat" name="harga" value="{{ $obat->harga }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Stok</label>
        <input type="number"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Stok Obat" name="stok" value="{{ $obat->stok }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Kadaluarsa</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="expired" value="{{ $obat->expired }}">
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection