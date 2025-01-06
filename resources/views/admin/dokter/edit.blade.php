@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.obat.update', $obat->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama Dokter</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama Dokter" name="nama_dokter" value="{{ $dokter->nama_obat }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Alamat</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Alamat" name="alamat" value="{{ $dokter->alamat }}">
    </div>
    <div class="mb-6">
    <label class="block text-sm mb-2 text-gray-400">Jenis Kelamin</label>
        <select name="jenis_kelamin"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="laki_laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>

    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Lahir</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tanggal_lahir" value="{{ $dokter->tanggal_lahir }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Email</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Email Dokter" name="email" value="{{ $dokter->email }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">No Telepon</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Telepon Dokter" name="no_telp" value="{{ $dokter->no_telp }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Spesialis</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Spesialis Dokter" name="spesialis" value="{{ $dokter->spesialis }}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jadwal Praktik</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="jadwal_praktik" cols="30" rows="10" placeholder="Masukan jadwal" >{{ $dokter->jadwal_praktik }}"</textarea>

    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Gaji</label>
        <input type="number"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Gaji Dokter" name="gaji" value="{{ $dokter->gaji }}">
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection