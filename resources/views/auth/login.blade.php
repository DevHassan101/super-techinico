<x-guest-layout>
    
    <style>
    .signup:hover {
    text-decoration: underline;
}

    </style>
    
    
    {{-- <a href="/" class="flex justify-center items-center">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
    </a> --}}

    <h1 class="!text-[40px] !font-bold">
        Login
    </h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}" class="mt-4">
    @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')"/>
            <x-text-input type="email"
                     name="email"
                     id="email"
                     value="{{ old('email') }}"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')"/>
            <div class="relative">
                <x-text-input type="password"
                        name="password"
                        id="password"
                        required
                        autocomplete="current-password"
                />
                <button type="button" onclick="togglePassword(this, 'password')" data-status="text"
                    class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                    <i class="fa-regular fa-eye-slash" id="icon-password"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            <!-- Remember Me -->
            <div>
                {{-- <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-indigo-600" name="remember">
                    <span class="mx-2 text-gray-600 text-sm">{{ __('Remember me') }}</span>
                </label> --}}
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a class="block text-[20px] fontme text-[#000000] hover:underline"
                       href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
        </div>

        <div class="mt-6 text-center">
            <x-primary-button class="w-full mx-auto !rounded-lg !text-[16px] login-btn">
                {{ __('Log in') }}
            </x-primary-button>
            <p class="text-center md:text-[20px] text-[16px] font-medium mt-3">
                Don't you have an account? <a href="{{route('register')}}" class="!text-[#FF71A6] signup">Sign up</a>
            </p>
        </div>

    </form>
</x-guest-layout>
