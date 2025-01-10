@extends('layouts.dashboard.app')
@section('content')
@if ($errors->any())
<div class="mb-4 text-red-500">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('dashboard.akun.store') }}" method="POST">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama " name="nama">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Email</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Email " name="email">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Alamat</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Alamat" name="alamat"></textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Username</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama " name="username">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nomor Telepon</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nomor Telepon" name="telp">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jenis Kelamin</label>
        <select name="jenis_kelamin"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="l">Laki-laki</option>
            <option value="p">Perempuan</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Lahir</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tanggal_lahir">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Spesialis</label>
        <select name="spesialis"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Spesialis</option>
            <option value="pu">Poli Umum</option>
            <option value="pg">Poli Gigi</option>
            <option value="pk">Poli Kandungan</option>
            <option value="ppd">Poli Penyakit Dalam</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Password</label>
        <input type="password"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="password">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Role</label>
        <select name="role"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="dokter">Dokter</option>
            <option value="apoteker">Apoteker</option>
            <option value="pasien">Pasien</option>
        </select>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection