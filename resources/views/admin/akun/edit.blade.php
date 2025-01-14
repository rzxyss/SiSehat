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
<form action="{{ route('dashboard.akun.update', $akun->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama " name="name" value="{{$akun->name}}">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Email</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Email " name="email" value="{{$akun->email}}">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Alamat</label>
        <textarea
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Alamat" name="alamat">{{$akun->alamat}}</textarea>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Username</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama " name="username" value="{{$akun->username}}">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nomor Telepon</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nomor Telepon" name="telp" value="{{$akun->telp}}">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jenis Kelamin</label>
        <select name="jenis_kelamin"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="l" {{$akun->jenis_kelamin == 'l' ? 'selected' : ''}}>Laki-laki</option>
            <option value="p" {{$akun->jenis_kelamin == 'p' ? 'selected' : ''}}>Perempuan</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal Lahir</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tanggal_lahir" value="{{$akun->tanggal_lahir}}">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Spesialis</label>
        <select name="spesialis"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Spesialis</option>
            <option value="pu" {{$akun->spesialis == 'pu' ? 'selected' : ''}}>Poli Umum</option>
            <option value="pg" {{$akun->spesialis == 'pg' ? 'selected' : ''}}>Poli Gigi</option>
            <option value="pk" {{$akun->spesialis == 'pk' ? 'selected' : ''}}>Poli Kandungan</option>
            <option value="ppd" {{$akun->spesialis == 'ppd' ? 'selected' : ''}}>Poli Penyakit Dalam</option>
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
            <option value="admin" {{$akun->role == 'admin' ? 'selected' : ''}}>Admin</option>
            <option value="dokter" {{$akun->role == 'dokter' ? 'selected' : ''}}>Dokter</option>
            <option value="apoteker" {{$akun->role == 'apoteker' ? 'selected' : ''}}>Apoteker</option>
            <option value="pasien" {{$akun->role == 'pasien' ? 'selected' : ''}}>Pasien</option>
        </select>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection