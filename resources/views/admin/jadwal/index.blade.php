@extends('layouts.dashboard.app')

@section('content')
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('dashboard.jadwal.tambah') }}"
            class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
            Tambah Jadwal
        </a>
    @endif
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
                    @if (Auth::user()->role == 'admin')
                        <th scope="col" class="p-4 font-semibold">Aksi</th>
                    @endif
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
                            <h3 class="font-medium">{{ $d->dokter->name }}</h3>
                        </td>
                        @if (Auth::user()->role == 'admin')
                            <td class="p-4">
                                <h3 class="font-medium">
                                    <div class="flex flex-row gap-1 items-center">
                                        <a href="{{ route('dashboard.jadwal.edit', $d->id) }}"
                                            class="py-2 px-6 bg-yellow-500 hover:bg-yellow-700 rounded-2xl text-xs">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.jadwal.destroy', $d->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="py-2 px-6 bg-red-500 hover:bg-red-700 rounded-2xl text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </h3>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
