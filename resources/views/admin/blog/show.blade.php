@extends('layouts.dashboard.app')

@section('content')
    <div class="flex flex-col items-center gap-2">
        <h1 class="text-lg font-bold">
            {{ $blog->title }}
        </h1>
        <img class="h-auto" src="{{ asset('assets/image/blog/' . $blog->thumbnail) }}" alt="Thumbnail"
            style="max-width: screen;">

    </div>
    <p class="mt-4">
        {!! nl2br($blog->content) !!}
    </p>
@endsection
