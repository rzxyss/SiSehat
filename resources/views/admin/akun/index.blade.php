@extends('layouts.dashboard.app')

@section('content')
<a href="{{ route('dashboard.akun.tambah') }}"
    class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
    Tambah Akun
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
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($akun as $index => $d)
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
                    <h3 class="font-medium">{{ $d->telp }}</h3>
                </td>
                <td class="p-4">
                    @if ($d->spesialis == 'pu')
                    <h3 class="font-medium">Poli Umum</h3>
                    @elseif($d->spesialis == 'pg')
                    <h3 class="font-medium">Poli Gigi</h3>
                    @elseif($d->spesialis == 'pk')
                    <h3 class="font-medium">Poli Kandungan</h3>
                    @elseif($d->spesialis == 'ppd')
                    <h3 class="font-medium">Poli Penyakit Dalam</h3>
                    @else
                    <h3 class="font-medium">-</h3>
                    @endif
                </td>
                <td class="flex flex-row gap-1 items-center p-4">
                    <a href="{{route('dashboard.akun.edit', $d->id)}}" class="py-2 px-6 btn btn-dark text-xs">Edit</a>
                    <form method="POST" action="{{ route('dashboard.akun.destroy', $d->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-2 px-6 btn text-xs bg-red-600 text-white hover:bg-red-700 ">
                                    Hapus
                                </button>
                            </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection