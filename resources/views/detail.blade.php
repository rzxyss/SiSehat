@extends('layouts.home')

@section('home')
    <div class="bg-gray-50 min-h-screen w-full py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
                <p class="text-sm text-gray-500">Dipublikasikan oleh <span
                        class="font-semibold">{{ $blog->author->name }}</span> pada {{ $blog->created_at->format('d M Y') }}
                </p>
            </div>

            <!-- Thumbnail -->
            <div class="mb-8">
                <img src="{{ asset('assets/image/blog/' . $blog->thumbnail) }}" alt="Thumbnail"
                    class="w-full h-64 object-cover rounded-lg shadow-md">
            </div>

            <!-- Content -->
            <div class="prose max-w-none">
                {!! nl2br($blog->content) !!}
            </div>

            <!-- Back Button -->
            <div class="mt-12 text-center">
                <a href="{{ route('blog.index') }}"
                    class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">Kembali ke Blog</a>
            </div>
        </div>
    </div>
@endsection
