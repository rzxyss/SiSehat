<x-guest-layout>
    <div class="max-w-md w-full bg-white rounded-xl">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="username"
                    placeholder="Masukan Nama Lengkap" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Masukan Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="text" name="username" :value="old('username')" required autofocus autocomplete="username"
                    placeholder="Masukan Username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Telp -->
            <div>
                <x-input-label for="telp" :value="__('Nomor Telepon')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="telp"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="text" name="telp" :value="old('telp')" required autofocus autocomplete="telp"
                    placeholder="Masukan Nomor Telepon" />
                <x-input-error :messages="$errors->get('telp')" class="mt-2" />
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')"
                    class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="tanggal_lahir"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required autofocus
                    autocomplete="tanggal_lahir" placeholder="Masukan Nama Lengkap" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <!-- Alamat -->
            <div>
                <x-input-label for="alamat" :value="__('Alamat')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="alamat"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat"
                    placeholder="Masukan Alamat Lengkap" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-shade2 text-white font-medium py-2.5 rounded-lg transition-colors">
                {{ __('Registrasi') }}
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            {{ __('Sudah memiliki akun?') }}
            <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium">{{ __('Klik disini') }}</a>
        </div>
    </div>
</x-guest-layout>
