@extends('layouts.dashboard.app')

@section('content')
    <a href="{{ route('dashboard.blog.tambah') }}"
        class="py-2 px-6 btn text-xs bg-yellow-600 text-white hover:bg-yellow-700 ">
        Upload Blog
    </a>
    <div class="relative overflow-x-auto">
        <!-- table -->
        <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
            <thead>
                <tr class="text-sm">
                    <th scope="col" class="p-4 font-semibold">No</th>
                    <th scope="col" class="p-4 font-semibold">Thumbnail</th>
                    <th scope="col" class="p-4 font-semibold">Judul</th>
                    <th scope="col" class="p-4 font-semibold">Slug</th>
                    <th scope="col" class="p-4 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $index => $a)
                    <tr>
                        <td class="p-4">
                            <h3 class="font-bold">{{ $index + 1 }}</h3>
                        </td>
                        <td class="p-4">
                            <img class="h-auto" id="preview" src="{{ asset('assets/image/blog/' . $a->thumbnail) }}"
                                alt="Thumbnail" width="100px">
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $a->title }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">{{ $a->slug }}</h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium">
                                <div class="flex flex-row gap-1 items-center">
                                    <a href="{{ route('dashboard.blog.edit', $a->id) }}"
                                        class="py-2 px-6 bg-yellow-500 hover:bg-yellow-700 rounded-2xl text-xs">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.blog.destroy', $a->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2 px-6 bg-red-500 hover:bg-red-700 rounded-2xl text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                    <a href="{{ route('dashboard.blog.detail', $a->id) }}"
                                        class="py-2 px-6 bg-blue-500 hover:bg-blue-700 rounded-2xl text-xs">
                                        Detail
                                    </a>
                                </div>
                            </h3>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
