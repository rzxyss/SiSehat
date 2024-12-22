@extends('layouts.home')
@section('home')
    <div class="flex flex-row justify-evenly items-center w-full">
        <div class="flex flex-col gap-5">
            <h1 class="font-montserrat font-semibold text-6xl">SiSehat</h1>
            <h1 class="font-montserrat font-semibold text-xl text-primary">Sistem Informasi Kesehatan</h1>
            <p class="font-montserrat font-medium text-base text-ngrey">Ingin membuat jadwal temu dengan dokter, mencari
                informasi tentang kesehatan?</p>
            <div>
                <a href="#"
                    class="py-2 px-4 font-montserrat font-medium text-base bg-primary text-white rounded-md">Sign Up</a>
            </div>
        </div>
        <div>
            <img src="{{ asset('/assets/image/hero.png') }}">
        </div>
    </div>
@endsection
