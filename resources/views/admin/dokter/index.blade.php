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
                <th scope="col" class="p-4 font-semibold">Alamat</th>
                <th scope="col" class="p-4 font-semibold">Jenis Kelamin</th>
                <th scope="col" class="p-4 font-semibold">Tanggal lahir</th>
                <th scope="col" class="p-4 font-semibold">Email</th>
                <th scope="col" class="p-4 font-semibold">No Telp</th>
                <th scope="col" class="p-4 font-semibold">Spesialis</th>
                <th scope="col" class="p-4 font-semibold">Jadwal Praktik</th>
                <th scope="col" class="p-4 font-semibold">Gaji</th>
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokter as $index => $d)
            <tr>
                <td class="p-4">
                    <h3 class="font-bold">{{ $index + 1 }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->nama_dokter }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->alamat }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">Rp. {{ $d->jenis_kelamin }}</h3>
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
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->jadwal_praktik }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->gaji }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">
                        <div class="flex flex-row gap-1 items-center">
                            <a href="{{ route('dashboard.dokter.edit', $d->id) }}"
                                class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.dokter.destroy', $d->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-2 px-6 btn text-xs bg-red-600 text-white hover:bg-red-700 ">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </h3>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection