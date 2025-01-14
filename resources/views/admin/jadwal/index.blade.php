@extends('layouts.dashboard.app')

@section('content')
<a href="{{ route('dashboard.jadwal.tambah') }}"
    class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
    Tambah Jadwal
</a>
<div class="relative overflow-x-auto">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
        <thead>
            <tr class="text-sm">
                <th scope="col" class="p-4 font-semibold">No</th>
                <th scope="col" class="p-4 font-semibold">Tanggal</th>
                <th scope="col" class="p-4 font-semibold">Jam Mulai</th>
                <th scope="col" class="p-4 font-semibold">Jam selesai</th>
                <th scope="col" class="p-4 font-semibold">ID Dokter</th>
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $index => $d)
            <tr>
                <td class="p-4">
                    <h3 class="font-bold">{{ $index + 1 }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->tanggal }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->jam_mulai }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->jam_selesai }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->id_dokter }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">
                        <div class="flex flex-row gap-1 items-center">
                            <a href="{{ route('dashboard.jadwal.edit', $d->id) }}"
                                class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.jadwal.destroy', $d->id) }}">
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