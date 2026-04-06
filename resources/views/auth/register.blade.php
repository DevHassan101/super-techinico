<style>
    .signup:hover {
        text-decoration: underline;
    }
</style>
<x-guest-layout>
    {{-- <a href="/" class="flex justify-center items-center">
        <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
    </a> --}}

    <div class="flex justify-around text-[30px] sm:text-[36px] font-medium mb-5">
        <span class="my-form cursor-pointer text-[#FF71A6]  decoration-[#393ED7] decoration-[0.10rem]">
            User
        </span>
        <span class="my-form cursor-pointer">
            Worker
        </span>
    </div>

    <div class="price-position">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                    placeholder="Andy john" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-2 sm:mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Example@email.com" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="grid sm:grid-cols-2 sm:gap-5">

                <!-- Password -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative">
                        <x-text-input type="password" name="password" id="password" required
                            autocomplete="current-password" placeholder="**********" />
                        <button type="button" onclick="togglePassword(this, 'password')" data-status="text"
                            class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                            <i class="fa-regular fa-eye-slash" id="icon-password"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="relative">
                        <x-text-input type="password" name="password_confirmation" id="password_confirmation" required
                            placeholder="**********" />
                        <button type="button" onclick="togglePassword(this, 'password_confirmation')"
                            data-status="text"
                            class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                            <i class="fa-regular fa-eye-slash" id="icon-password_confirmation"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>
            <div class="mt-2 sm:mt-3">
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input type="file" name="image" id="image" required/>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-primary-button class="w-full !rounded-lg !text-[16px] !my-5">
                    {{ __('Sign up') }}
                </x-primary-button>

                <p class="text-center text-[20px] font-medium mt-3">
                    Already have an account? <a href="{{ route('login') }}" class="!text-[#FF71A6] signup">Login</a>
                </p>
            </div>
        </form>
    </div>
    <div class="hidden price-position" id="price-position">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="role" value="worker">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required
                    autofocus placeholder="Andy john" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-2 sm:mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Example@email.com" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="grid sm:grid-cols-2 sm:gap-5">

                <!-- Password -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative">
                        <x-text-input type="password" name="password" id="password_2" required
                            autocomplete="current-password" placeholder="**********" />
                        <button type="button" onclick="togglePassword(this, 'password_2')" data-status="text"
                            class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                            <i class="fa-regular fa-eye-slash" id="icon-password_2"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="relative">
                        <x-text-input type="password" name="password_confirmation" id="password_confirmation_2" required
                            placeholder="**********" />
                        <button type="button" onclick="togglePassword(this, 'password_confirmation_2')"
                            data-status="text"
                            class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#442AE2]">
                            <i class="fa-regular fa-eye-slash" id="icon-password_confirmation_2"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>

            <div class="grid sm:grid-cols-2 sm:gap-5">

                <!-- Position -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="position" :value="__('Position')" />
                    <select class="w-full" name="position">
                        <option value="" selected>Select</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>

                <!-- Location -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="position" :value="__('Location')" />
                    <select class="w-full" name="location">
                        <option value="" selected>Select</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>

            </div>

            <div class="grid sm:grid-cols-2 sm:gap-5">

                <!-- Price -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input type="number" name="price" id="price" max="1500" required placeholder="$20 / h" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Image -->
                <div class="mt-2 sm:mt-3">
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input type="file" name="image" id="image" required/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

            </div>

            <div class="flex flex-col items-center mt-4">
                <x-primary-button class="w-full !rounded-lg !text-[16px] !my-5">
                    {{ __('Sign up') }}
                </x-primary-button>

                <p class="text-center text-[20px] font-medium mt-3">
                    Already have an account? <a href="{{ route('login') }}" class="!text-[#FF71A6] signup">Login</a>
                </p>
            </div>
        </form>
    </div>


    @push('script')
        <script>
            $('.my-form').click(function(e) {
                e.preventDefault();
                $('.cursor-pointer').toggleClass('text-[#FF71A6] decoration-[#393ED7] decoration-[0.10rem]');
                $('.price-position').toggleClass('hidden');
            });
        </script>
    @endpush
</x-guest-layout>
