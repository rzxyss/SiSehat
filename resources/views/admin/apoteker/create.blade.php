@extends('layouts.dashboard.app')
@section('content')
<form action="{{ route('dashboard.apoteker.store') }}" method="POST">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Nama Apoteker</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nama Apoteker" name="nama_apoteker">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">No Telepon</label>
        <input type="text"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Nomor Telepon" name="no_telepon">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Email</label>
        <input type="email"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            placeholder="Masukan Email Apoteker" name="email">
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection
