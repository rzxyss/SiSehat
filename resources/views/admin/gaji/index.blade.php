@extends('layouts.dashboard.app')

@section('content')
<a href="{{ route('dashboard.gaji.tambah') }}"
    class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
    Tambah Data Gaji
</a>
<div class="relative overflow-x-auto mt-4">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
        <thead>
            <tr class="text-sm">
                <th scope="col" class="p-4 font-semibold">No</th>
                <th scope="col" class="p-4 font-semibold">Nama Dokter</th>
                <th scope="col" class="p-4 font-semibold">Tanggal Ambil</th>
                <th scope="col" class="p-4 font-semibold">Gaji</th>
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gaji as $index => $g)
            <tr>
                <td class="p-4">
                    <h3 class="font-bold">{{ $index + 1 }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $g->dokter->name ?? 'Tidak Diketahui' }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $g->tanggal_ambil }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">Rp {{ number_format($g->gaji, 0, ',', '.') }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">
                        <div class="flex flex-row gap-1 items-center">
                            <a href="{{ route('dashboard.gaji.edit', $g->id) }}"
                                class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.gaji.destroy', $g->id) }}">
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
