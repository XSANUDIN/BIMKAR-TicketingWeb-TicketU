{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl p-8">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-gray-800 dark:text-gray-200"
            :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <x-input-label
                    for="email"
                    :value="__('Email')"
                    class="text-gray-700 dark:text-gray-300 font-semibold mb-2"
                />

                <x-text-input
                    id="email"
                    class="block w-full px-4 py-3 rounded-xl
                           bg-white dark:bg-gray-800
                           text-gray-900 dark:text-gray-100
                           border border-gray-300 dark:border-gray-700
                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                           transition duration-200"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="your@email.com"
                />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <x-input-label
                    for="password"
                    :value="__('Password')"
                    class="text-gray-700 dark:text-gray-300 font-semibold mb-2"
                />

                <x-text-input
                    id="password"
                    class="block w-full px-4 py-3 rounded-xl
                           bg-white dark:bg-gray-800
                           text-gray-900 dark:text-gray-100
                           border border-gray-300 dark:border-gray-700
                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                           transition duration-200"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-6 mt-2">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 dark:border-gray-700
                               text-indigo-600 focus:ring-indigo-500
                               bg-white dark:bg-gray-800"
                        name="remember"
                    >
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400 font-medium">
                        Remember me
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 dark:text-indigo-400
                              hover:text-indigo-700 dark:hover:text-indigo-300
                              font-medium transition duration-200"
                       href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r
                       from-black to-gray-800
                       dark:from-indigo-600 dark:to-indigo-700
                       hover:from-gray-900 hover:to-gray-700
                       dark:hover:from-indigo-500 dark:hover:to-indigo-600
                       text-white font-semibold py-3 px-4 rounded-xl
                       shadow-lg hover:shadow-xl
                       transform hover:-translate-y-0.5
                       transition duration-200"
            >
                Sign In
            </button>
        </form>
    </div>
</x-guest-layout>
