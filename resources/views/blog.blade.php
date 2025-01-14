@extends('layouts.home')

@section('home')
    <div class="bg-gray-50 min-h-screen w-full py-12">
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
                    <form class="relative" method="GET" action="{{ route('blog.index') }}" id="searchForm">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..."
                            class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-primary focus:border-primary"
                            oninput="debouncedSubmit();">
                    </form>
                </div>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($blog as $b)
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('assets/image/blog/' . $b->thumbnail) }}" alt="Blog thumbnail"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-2 hover:text-primary">
                                <a href="#">{{ $b->title }}</a>
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ nl2br($b->content) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/image/profile/profile.jpg') }}" alt="Author"
                                        class="w-8 h-8 rounded-full">
                                    <span class="text-sm text-gray-700">{{ $b->author->name }}</span>
                                </div>
                                <span class="text-sm text-gray-500">2 hari yang lalu</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center gap-2">
                    {{-- Tombol Previous --}}
                    @if ($blog->onFirstPage())
                        <span class="px-4 py-2 bg-gray-200 border rounded-lg text-gray-400 cursor-not-allowed">&laquo;
                            Previous</span>
                    @else
                        <a href="{{ $blog->previousPageUrl() }}"
                            class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">&laquo; Previous</a>
                    @endif

                    {{-- Tombol Angka Halaman --}}
                    @foreach ($blog->getUrlRange(1, $blog->lastPage()) as $page => $url)
                        @if ($page == $blog->currentPage())
                            <span class="px-4 py-2 bg-primary text-white rounded-lg">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Tombol Next --}}
                    @if ($blog->hasMorePages())
                        <a href="{{ $blog->nextPageUrl() }}"
                            class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50">Next &raquo;</a>
                    @else
                        <span class="px-4 py-2 bg-gray-200 border rounded-lg text-gray-400 cursor-not-allowed">Next
                            &raquo;</span>
                    @endif
                </nav>
            </div>

        </div>
    </div>

    <script>
        let debounceTimer;

        function debouncedSubmit() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 500); // Tunggu 500ms sebelum submit
        }
    </script>
@endsection
