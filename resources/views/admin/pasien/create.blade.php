@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.pasien.store') }}">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama Pasien</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama Pasien" name="nama_pasien">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Lahir</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tgl_lahir">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jenis Kelamin</label>
        <select
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="jenis_kelamin">
            <option value="laki_laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nomor Telepon</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nomor Telepon" name="no_telp">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Alamat</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="alamat" cols="30" rows="3" placeholder="Masukan Alamat"></textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Riwayat Alergi</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="riwayat_alergi" cols="30" rows="3" placeholder="Masukan Riwayat Alergi (jika ada)"></textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Riwayat Penyakit</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
            name="riwayat_penyakit" cols="30" rows="3" placeholder="Masukan Riwayat Penyakit (jika ada)"></textarea>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection
