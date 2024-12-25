<x-guest-layout>
    <div class="max-w-md w-full bg-white rounded-xl">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __('Login') }}</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Masukan email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')"
                    class="block text-sm font-medium text-gray-700 mb-1" />
                <x-text-input id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-shade2 text-white font-medium py-2.5 rounded-lg transition-colors">
                {{ __('Sign In') }}
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            {{ __("Tidak memiliki akun?") }}
            <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">{{ __('Klik disini') }}</a>
        </div>
    </div>
</x-guest-layout>