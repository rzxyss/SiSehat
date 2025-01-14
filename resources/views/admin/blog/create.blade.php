@extends('layouts.dashboard.app')
@section('content')
    <form method="POST" action="{{ route('dashboard.blog.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6 flex flex-row justify-between px-6 gap-6">
            <div class="mb-6">
                <label class="block text-sm mb-2 text-gray-400">Thumbnail</label>
                <input type="file"
                    class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
                    name="thumbnail" id="thumbnail">
            </div>
            <div>
                <img class="h-auto" id="preview" src="{{ asset('assets/image/blog/default.jpg') }}"
                    alt="Thumbnail" width="250px">
            </div>
        </div>
        <div class="mb-6">
            <label class="block text-sm mb-2 text-gray-400">Judul</label>
            <input type="text"
                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
                placeholder="Masukan Judul Blog" name="title">
        </div>
        <div class="mb-6">
            <label class="block text-sm mb-2 text-gray-400">Slug</label>
            <input type="text"
                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
                name="slug" readonly>
        </div>
        <div class="mb-6">
            <label class="block text-sm mb-2 text-gray-400">Blog</label>
            <textarea
                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                name="content" cols="30" rows="10" placeholder="Masukan Blog"></textarea>
        </div>
        <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/dfsgei4epuodyrjrzxflbqwcf1h5udhrdhglnymmiw69w8n3/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        document.querySelector('input[name="title"]').addEventListener('input', function() {
            const maxSlugLength = 50; // Batas panjang slug
            let slug = this.value
                .toLowerCase() // Ubah menjadi huruf kecil
                .replace(/[^\w\s]/g, '') // Hapus karakter selain huruf, angka, dan spasi
                .replace(/\s+/g, '-') // Ganti spasi dengan tanda hubung
                .substring(0, maxSlugLength); // Batasi panjang slug
            document.querySelector('input[name="slug"]').value = slug;
        });
        tinymce.init({
            selector: 'textarea[name="content"]',
            plugins: 'advlist autolink lists link charmap preview anchor',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            menubar: false
        });

        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
