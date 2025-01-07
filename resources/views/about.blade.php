@extends('layouts.home')

@section('home')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Blog Kesehatan</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Tips dan informasi terkini seputar kesehatan untuk
                membantu Anda menjalani hidup yang lebih sehat.</p>
        </div>

        <!-- Search and Categories -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div class="w-full md:w-64">
                <form class="relative">
                    <input type="text" placeholder="Cari artikel..."
                        class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-primary focus:border-primary">
                    <button type="submit" class="absolute right-3 top-2.5">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="flex gap-2 overflow-x-auto">
                <a href="#" class="px-4 py-2 bg-primary text-white rounded-full hover:bg-shade1">Semua</a>
                <a href="#" class="px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100">Nutrisi</a>
                <a href="#" class="px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100">Olahraga</a>
                <a href="#" class="px-4 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100">Mental</a>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 6; $i++) <article
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <img src="https://source.unsplash.com/random/800x600/?health,{{ $i }}" alt="Blog thumbnail"
                    class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">Nutrisi</span>
                        <span class="text-gray-500 text-sm">5 menit baca</span>
                    </div>
                    <h2 class="text-xl font-semibold mb-2 hover:text-primary">
                        <a href="#">Tips Menjaga Pola Makan Sehat di Masa Pandemi</a>
                    </h2>
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <img src="https://source.unsplash.com/random/100x100/?face" alt="Author"
                                class="w-8 h-8 rounded-full">
                            <span class="text-sm text-gray-700">Dr. John Doe</span>
                        </div>
                        <span class="text-sm text-gray-500">2 hari yang lalu</span>
                    </div>
                </div>
                </article>
                @endfor
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
                <a href="#" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">&laquo; Previous</a>
                <a href="#" class="px-4 py-2 bg-primary text-white rounded-lg">1</a>
                <a href="#" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">3</a>
                <a href="#" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">Next &raquo;</a>
            </nav>
        </div>
    </div>
</div>
@endsection