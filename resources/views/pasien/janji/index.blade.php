@extends('layouts.home')

@section('home')
    <div class="bg-gray-50 min-h-screen py-12 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Daftar Janji Temu</h1>
            </div>

            <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center gap-1">
                <div class="flex gap-4">
                    <form method="GET" action="{{ route('pasien.janji.index') }}" id="filterForm">
                        <select name="status" id="statusForm" onchange="debouncedSubmit();"
                            class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-48">
                            <option value="">Semua Status</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Menunggu Persetujuan
                            </option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Disetujui</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Ditolak</option>
                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>

                </div>
                <a href="{{ route('pasien.janji.create') }}"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Tambah Janji Temu
                </a>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No.
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Pasien
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal & Waktu
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dokter
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alasan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($janji as $index => $d)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">{{ $d->pasien->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $d->tanggal_temu }}</div>
                                    <div class="text-sm text-gray-500">{{ $d->jam_temu }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $d->dokter->name }}</div>
                                    <div class="text-sm text-gray-500">
                                        @if ($d->dokter->spesialis == 'pu')
                                            Poli Umum
                                        @elseif($d->dokter->spesialis == 'pg')
                                            Poli Gigi
                                        @elseif($d->dokter->spesialis == 'pk')
                                            Poli Kandungan
                                        @elseif($d->dokter->spesialis == 'ppd')
                                            Poli Penyakit Dalam
                                        @else
                                            -
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($d->status == 0)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Menunggu Persetujuan
                                        </span>
                                    @elseif ($d->status == 1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @elseif ($d->status == 2)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Selesai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">{{ $d->alasan != null ? $d->alasan : '-' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </button>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span
                                    class="font-medium">20</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                @if ($janji->onFirstPage())
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">&laquo;
                                        Previous</span>
                                @else
                                    <a href="{{ $janji->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">&laquo;
                                        Previous</a>
                                @endif

                                @foreach ($janji->getUrlRange(1, $janji->lastPage()) as $page => $url)
                                    @if ($page == $janji->currentPage())
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-700 text-sm font-medium text-white hover:bg-gray-50">{{ $page }}</a>
                                    @endif
                                @endforeach

                                @if ($janji->hasMorePages())
                                    <a href="{{ $janji->nextPageUrl() }}"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Next
                                        &raquo;</a>
                                @else
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">Next
                                        &raquo;</span>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let debounceTimer;

        function debouncedSubmit() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 500);
        }
    </script>
@endsection
