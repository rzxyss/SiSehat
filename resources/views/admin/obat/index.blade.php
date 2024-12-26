@extends('layouts.dashboard.app')

@section('content')
<div class="row">
        <div class="col-md-12">

            <h4>User List</h4>

            <!-- Notifikasi menggunakan flash session data -->
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('obat.tambah') }}" class="btn btn-md btn-success mb-3 float-end">New
                        User</a>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Expired</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($obat as $d)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td>{{ $d->nama_obat }}</td>
                                <td>{{ $d->deskripsi }}</td>
                                <td>{{ $d->stok }}</td>
                                <td>{{ $d->harga }}</td>
                                <td>{{ $d->expired }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data user tidak tersedia</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection
