@extends('layouts.dashboard.app')
@section('content')
<form method="POST" action="{{ route('dashboard.jadwal.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Tanggal</label>
        <input type="date"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="tanggal">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jam Mulai</label>
        <input type="time"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="jam_mulai">
    </div>
    <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400">Jam selesai</label>
        <input type="time"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
            name="jam_selesai">
    </div>
    <div class=" mb-6">
        <label class="block text-sm mb-2 text-gray-400">Dokter</label>
        <select name="dokter"
            class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
            <option value="" disabled selected>Pilih Dokter</option>
            @foreach ($dokter as $d)
            <option value="{{$d->id}}">{{$d->name}}</option>
            
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
</form>
@endsection