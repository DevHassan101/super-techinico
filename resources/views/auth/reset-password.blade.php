<x-guest-layout>
    <a href="{{ url('/') }}" class="flex justify-center items-center">
        <img src="{{asset('assets/images/logo.png')}}" />
        <!--<x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>-->
    </a>

    <form method="POST" action="{{ route('password.store') }}">
    @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input type="email"
                     name="email"
                     id="email"
                     value="{{ old('email', $request->email) }}"
                     required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')"/>
            <div class="relative">
                <x-text-input type="password" name="password" id="password" required autocomplete="current-password"/>
                <button type="button" onclick="togglePassword(this, 'password')" data-status="text"
                    class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                    <i class="fa-regular fa-eye-slash" id="icon-password"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <div class="relative">
                <x-text-input type="password" name="password_confirmation" id="password_confirmation" required/>
                <button type="button" onclick="togglePassword(this, 'password_confirmation')" data-status="text"
                    class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                    <i class="fa-regular fa-eye-slash" id="icon-password_confirmation"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
