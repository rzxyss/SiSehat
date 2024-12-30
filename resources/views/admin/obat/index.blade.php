@extends('layouts.dashboard.app')

@section('content')
<a href="{{ route('dashboard.obat.tambah') }}"
    class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
    Tambah Obat
</a>
<div class="relative overflow-x-auto">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
        <thead>
            <tr class="text-sm">
                <th scope="col" class="p-4 font-semibold">No</th>
                <th scope="col" class="p-4 font-semibold">Nama Obat</th>
                <th scope="col" class="p-4 font-semibold">Deskripsi</th>
                <th scope="col" class="p-4 font-semibold">Harga</th>
                <th scope="col" class="p-4 font-semibold">Stok</th>
                <th scope="col" class="p-4 font-semibold">Tanggal Kadaluarsa</th>
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $index => $d)
            <tr>
                <td class="p-4">
                    <h3 class="font-bold">{{ $index + 1 }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->nama_obat }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->deskripsi }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">Rp. {{ $d->harga }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->stok }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $d->expired }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">
                        <div class="flex flex-row gap-1 items-center">
                            <a href="{{ route('dashboard.obat.edit', $d->id) }}"
                                class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.obat.destroy', $d->id) }}">
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