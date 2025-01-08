@extends('layouts.dashboard.app')

@section('content')
    <a href="{{ route('dashboard.dokter.tambah') }}"
        class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
        Tambah Dokter
    </a>
    <div class="relative overflow-x-auto">
        <!-- table -->
        <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
            <thead>
                <tr class="text-sm">
                    <th scope="col" class="p-4 font-semibold">No</th>
                    <th scope="col" class="p-4 font-semibold">Nama Dokter</th>
                    <th scope="col" class="p-4 font-semibold">Email</th>
                    <th scope="col" class="p-4 font-semibold">Nomor Telepon</th>
                    <th scope="col" class="p-4 font-semibold">Spesialis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokter as $index => $d)
                    <tr>
                        <td class="p-4">
                            <h3 class="font-bold">{{ $index + 1 }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $d->name }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $d->email }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $d->no_telp }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $d->spesialis }}</h3>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
