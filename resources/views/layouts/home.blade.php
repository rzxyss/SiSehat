<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo/sisehat.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased">
    <nav class="sticky top-0 bg-white shadow-md border-gray-200 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('assets/image/logo/sisehat2.png') }}" style="width: 120px; height: auto;">
            </a>

            <button data-collapse-toggle="navbar-menu" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:ring-2 focus:ring-primary"
                aria-controls="navbar-menu" aria-expanded="false">
                <span class="sr-only">Toggle menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-menu">
                <ul
                    class="font-montserrat flex flex-col p-4 md:p-0 mt-4 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:bg-transparent md:border-0">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 px-3 transition-colors md:p-0 {{ request()->routeIs('home') ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}"
                            class="block py-2 px-3 transition-colors md:p-0 {{ request()->is('blog*') ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bmi.index') }}"
                            class="block py-2 px-3 transition-colors md:p-0 {{ request()->routeIs('bmi.*') ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }}">
                            BMI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="block py-2 px-3 transition-colors md:p-0 {{ request()->is('about*') ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }}">
                            Tentang Kami
                        </a>
                    </li>
                    @if (Auth::user() != null)
                        <li>
                            <a href="{{ route('pasien.janji.index') }}"
                                class="block py-2 px-3 transition-colors md:p-0 {{ request()->is('pasien.janji.index') ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }}">
                                Janji Temu Saya
                            </a>
                        </li>
                    @endif
                    @if (Auth::user() == null)
                        <li>
                            <div class="md:hidden w-full mt-4" id="navbar-auth">
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="/login"
                                        class="text-center py-2 text-primary border-2 border-primary rounded-lg">
                                        Login
                                    </a>
                                    <a href="/register" class="text-center py-2 bg-primary text-white rounded-lg">
                                        Registrasi
                                    </a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="md:hidden">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="block px-4 py-2">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                @if (Auth::user() == null)
                    <a href="/login"
                        class="px-6 py-2 text-primary border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Login
                    </a>
                    <a href="/register"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-shade1 transition-colors">
                        Registrasi
                    </a>
                @else
                    <button data-dropdown-toggle="dropdownUser"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-shade1 transition-colors"
                        type="button">{{ Auth::user()->name }}
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownUser"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDividerButton">
                            {{-- <li>
                                <a href="{{ route('pasien.index') }}" class="block px-4 py-2">Dashboard</a>
                            </li> --}}
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="block px-4 py-2">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @yield('home')
    </div>
    <footer class="w-full text-black p-2 absolute fixed-bottom">
        <div class="container mx-auto text-center text-sm">
            <p>
                <span class="text-slate-500 font-semibold">{{ \Carbon\Carbon::now()->translatedFormat('Y') }}&copy;
                </span>
                Sisehat.
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @yield('js')
</body>

</html>
