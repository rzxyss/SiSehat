@extends('layouts.dashboard.app')
@section('content')
    <form method="POST" action="{{ route('dashboard.janji.approve', $janjiTemu->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label class="block text-sm mb-2 text-gray-400">Status</label>
            <select name="status" id="statusSelect"
                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                required>
                <option value="" selected disabled>Pilih Status</option>
                <option value="1">Setujui</option>
                <option value="2">Tolak</option>
            </select>
        </div>
        <div class="mb-6" id="alasanField" style="display: none;">
            <label class="block text-sm mb-2 text-gray-400">Alasan</label>
            <textarea name="alasan"
                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                rows="4"></textarea>
        </div>
        <button type="submit" class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('statusSelect');
            const alasanField = document.getElementById('alasanField');

            statusSelect.addEventListener('change', function() {
                if (this.value === '2') {
                    alasanField.style.display = 'block';
                } else {
                    alasanField.style.display = 'none';
                }
            });
        });
    </script>
@endsection
