@extends('layouts.home')

@section('home')
    <div class="bg-gray-50 min-h-screen py-12 w-full">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Tambah Janji Temu</h1>
                <p class="text-gray-600">Silakan isi formulir di bawah ini untuk membuat janji temu baru</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="{{ route('pasien.janji.store') }}" method="POST">
                    @csrf

                    <div class="mb-8">
                        <div class="flex flex-col md:flex-row gap-1 mb-6">
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Tanggal
                                </label>
                                <input type="date" name="tanggal_janji" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Waktu
                                </label>
                                <input type="time" name="jam_janji" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Pilih Dokter
                            </label>
                            <select name="dokter" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" selected disabled>Pilih Dokter</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} - @if ($d->spesialis == 'pu')
                                            Poli Umum
                                        @elseif($d->spesialis == 'pg')
                                            Poli Gigi
                                        @elseif($d->spesialis == 'pk')
                                            Poli Kandungan
                                        @elseif($d->spesialis == 'ppd')
                                            Poli Penyakit Dalam
                                        @else
                                            -
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('pasien.janji.index') }}"
                            class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Simpan Janji Temu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
