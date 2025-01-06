@extends('layouts.dashboard.app')

@section('content')
<a href="{{ route('dashboard.pasien.tambah') }}"
    class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
    Tambah Pasien
</a>
<div class="relative overflow-x-auto">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
        <thead>
            <tr class="text-sm">
                <th scope="col" class="p-4 font-semibold">No</th>
                <th scope="col" class="p-4 font-semibold">Nama Pasien</th>
                <th scope="col" class="p-4 font-semibold">Tanggal Lahir</th>
                <th scope="col" class="p-4 font-semibold">Jenis Kelamin</th>
                <th scope="col" class="p-4 font-semibold">No. Telepon</th>
                <th scope="col" class="p-4 font-semibold">Alamat</th>
                <th scope="col" class="p-4 font-semibold">Riwayat Alergi</th>
                <th scope="col" class="p-4 font-semibold">Riwayat Penyakit</th>
                <th scope="col" class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $index => $p)
            <tr>
                <td class="p-4">
                    <h3 class="font-bold">{{ $index + 1 }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->nama_pasien }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->tgl_lahir }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ ucfirst(str_replace('_', ' ', $p->jenis_kelamin)) }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->no_telp }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->alamat }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->riwayat_alergi ?? 'Tidak Ada' }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">{{ $p->riwayat_penyakit ?? 'Tidak Ada' }}</h3>
                </td>
                <td class="p-4">
                    <h3 class="font-medium">
                        <div class="flex flex-row gap-1 items-center">
                            <a href="{{ route('dashboard.pasien.edit', $p->id) }}"
                                class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.pasien.destroy', $p->id) }}">
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
