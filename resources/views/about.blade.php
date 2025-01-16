@extends('layouts.home')

@section('home')
    <div class="bg-gray-50 min-h-screen py-12 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Our Team</h1>
            </div>

            <div class="flex flex-col items-center md:flex-row mb-12">
                <div class="flex flex-col gap-1">
                    <img src="{{ asset('assets/image/profile/epull.jpg') }}" class="rounded-full" style="width: 200px;">
                    <h1 class="font-montserrat text-xl font-semibold">Frontend Developer</h1>
                </div>
                <div class="py-4 px-2 text-center md:text-left md:w-1/2">
                    <h1 class="font-montserrat text-2xl font-bold">Rizki Saepul Aziz</h1>
                    <h1 class="font-montserrat text-sm font-light">152023146</h1>
                    <p class="font-montserrat text-base font-normal">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Tempore officia ratione magnam eos esse aliquid laboriosam perspiciatis hic dolorum,
                        voluptatibus ipsum fugit animi eius tenetur eligendi repudiandae omnis eaque corporis alias.
                        Doloremque nihil qui similique maiores, repellendus odit! Optio repudiandae facere voluptatum, alias
                        laudantium atque quo doloremque ea totam temporibus.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse items-center md:flex-row md:justify-end mb-12">
                <div class="py-4 px-2 text-center md:w-1/2 md:text-right">
                    <h1 class="font-montserrat text-2xl font-bold">Raelqiansyah Putrantra Dibrata</h1>
                    <h1 class="font-montserrat text-sm font-light">152023167</h1>
                    <p class="font-montserrat text-base font-normal">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Tempore laboriosam sequi optio ut quod non reiciendis expedita dicta molestiae quis animi
                        rerum voluptas, sit incidunt eos accusantium velit neque, itaque doloremque aliquam rem obcaecati.
                        Explicabo qui, totam debitis aspernatur sunt, porro consequatur at corporis assumenda optio eius
                        deleniti natus! Consequuntur.</p>
                </div>
                <div class="flex flex-col gap-1">
                    <img src="{{ asset('assets/image/profile/rael.jpg') }}" class="rounded-full" style="width: 200px;">
                    <h1 class="font-montserrat text-xl font-semibold">Backend Developer</h1>
                </div>
            </div>
            <div class="flex flex-col items-center md:flex-row mb-12">
                <div class="flex flex-col gap-1">
                    <img src="{{ asset('assets/image/profile/reynal.jpg') }}" class="rounded-full" style="width: 200px;">
                    <h1 class="font-montserrat text-xl font-semibold">UI/UX Developer</h1>
                </div>
                <div class="py-4 px-2 text-center md:text-left md:w-1/2">
                    <h1 class="font-montserrat text-2xl font-bold">Reynal Toeloes</h1>
                    <h1 class="font-montserrat text-sm font-light">152023157</h1>
                    <p class="font-montserrat text-base font-normal">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Expedita ipsa alias blanditiis quidem cupiditate dolor ipsum porro quibusdam cumque
                        distinctio. Reprehenderit, neque cumque consequatur quis magni ex maiores ipsam magnam voluptatum,
                        minus amet ab esse quaerat architecto maxime aperiam impedit, doloremque expedita voluptatibus quia
                        eos sapiente nesciunt. Aperiam, suscipit magnam.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
