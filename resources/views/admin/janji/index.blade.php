@extends('layouts.dashboard.app')

@section('content')
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('dashboard.janji.tambah') }}"
            class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
            Tambah Janji Temu
        </a>
    @endif
    <div class="relative overflow-x-auto mt-4">
        <!-- table -->
        <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
            <thead>
                <tr class="text-sm">
                    <th scope="col" class="p-4 font-semibold">No</th>
                    <th scope="col" class="p-4 font-semibold">Nama Pasien</th>
                    <th scope="col" class="p-4 font-semibold">Nama Dokter</th>
                    <th scope="col" class="p-4 font-semibold">Tanggal Temu</th>
                    <th scope="col" class="p-4 font-semibold">Jam Temu</th>
                    <th scope="col" class="p-4 font-semibold">Status</th>
                    <th scope="col" class="p-4 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($janjiTemu as $index => $janji)
                    <tr>
                        <td class="p-4">
                            <h3 class="font-bold">{{ $index + 1 }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $janji->pasien->name ?? 'Tidak Diketahui' }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $janji->dokter->name ?? 'Tidak Diketahui' }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $janji->tanggal_temu }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $janji->jam_temu }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">
                                @switch($janji->status)
                                    @case(0)
                                        Menunggu Persetujuan
                                    @break

                                    @case(1)
                                        Disetujui
                                    @break

                                    @case(2)
                                        Ditolak
                                    @break

                                    @case(3)
                                        Selesai
                                    @break

                                    @default
                                        Tidak Diketahui
                                @endswitch
                            </h3>
                        </td>
                        <td class="p-4">
                            @if (Auth::user()->role == 'admin')
                                <div class="flex flex-row gap-1 items-center">
                                    <a href="{{ route('dashboard.janji.edit', $janji->id) }}"
                                        class="py-2 px-6 bg-yellow-500 hover:bg-yellow-700 rounded-2xl text-xs">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.janji.destroy', $janji->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2 px-6 bg-red-500 hover:bg-red-700 rounded-2xl text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @else
                                @if ($janji->status == 0)
                                    <a href="{{ route('dashboard.janji.approval', $janji->id) }}"
                                        class="py-2 px-6 bg-blue-600 hover:bg-blue-700 rounded-2xl text-xs text-white">
                                        Approval
                                    </a>
                                @elseif ($janji->status == 1)
                                    <form method="POST" action="{{ route('dashboard.janji.completed', $janji->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="py-2 px-6 bg-blue-600 hover:bg-blue-700 rounded-2xl text-xs text-white">
                                            Selesaikan
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
