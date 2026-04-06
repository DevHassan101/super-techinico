@extends('workers.layouts.app')
@section('title', 'Worker Profile')
@section('page-title', 'My Profile')
@section('content')

    <div class="content-wrapper">
        {{-- <a href="{{ route('admin.workers.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="28"
                viewBox="0 0 32 28" fill="none">
                <path d="M2 14L30 14M2 14L14 2M2 14L14 26" stroke="#FF71A6" stroke-width="4" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a> --}}
        <div class="content-card md:mt-[auto] mt-[20px]">
            <div class="create-form-container">
                <form action="{{ route('worker.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="mb-3">
                            <label for="fullName" class="text-md mb-1">Full Name</label>
                            <input type="text" id="fullName" name="name" class="w-full border rounded p-2"
                                placeholder="Maddy Dany" value="{{ Auth::user()->name }}" required>
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="text-md mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" disabled
                                class="w-full border rounded p-2" placeholder="example@domain.com" required>
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="grid sm:grid-cols-2 gap-5">
                        <div class="mb-3">
                            <label for="password" class="text-md mb-1">Password</label>
                            <input type="password" id="password" name="password" class="w-full border rounded p-2"
                                placeholder="Enter your password" required>
                            @error('password')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="text-md mb-1">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full border rounded p-2" placeholder="Enter your password" required>
                            @error('password_confirmation')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="grid sm:grid-cols-3 gap-5">
                        <div class="mb-3">
                            <label for="position" class="text-md mb-1">Position</label>
                            <select id="position" name="position" class="w-full border rounded p-2 py-3" required>
                                <option value="" selected>Select</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" @selected($position->id == Auth::user()->position_id)>{{ $position->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="text-md mb-1">Location</label>
                            <select id="location" name="location" class="w-full border rounded p-2 py-3" required>
                                <option value="" selected>Select</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" @selected($location->id == Auth::user()->location_id)>{{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('location')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="text-md mb-1">Price</label>
                            <input type="number" min="1" step="any" id="price" name="price"
                                class="w-full border rounded p-2" placeholder="Enter price"
                                value="{{ Auth::user()->price }}" required>
                            @error('price')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    @php
                        $workerLanguages = json_decode(Auth::user()->languages, true) ?? [];
                    @endphp
                    <div class="mb-3">
                        <label for="languages" class="text-md mb-1 block">Languages</label>
                        <div class="flex">
                            <label class="text-md mr-3 flex items-center cursor-pointer space-x-2">
                                <input type="checkbox" name="languages[]" value="English" class="peer hidden" @checked(in_array('English', $workerLanguages))>
                                <div
                                    class="w-5 h-5 border border-gray-300 rounded bg-white peer-checked:bg-[#FF71A6] peer-checked:after:content-['✓'] peer-checked:after:text-white peer-checked:after:text-sm peer-checked:after:flex peer-checked:after:justify-center peer-checked:after:items-center peer-checked:after:h-full peer-checked:after:w-full peer-checked:after:font-bold">
                                </div>
                                <span>English</span>
                            </label>
                            <label class="text-md mr-3 flex items-center cursor-pointer space-x-2">
                                <input type="checkbox" name="languages[]" value="Spanish" class="peer hidden" @checked(in_array('Spanish', $workerLanguages))>
                                <div
                                    class="w-5 h-5 border border-gray-300 rounded bg-white peer-checked:bg-[#FF71A6] peer-checked:after:content-['✓'] peer-checked:after:text-white peer-checked:after:text-sm peer-checked:after:flex peer-checked:after:justify-center peer-checked:after:items-center peer-checked:after:h-full peer-checked:after:w-full peer-checked:after:font-bold">
                                </div>
                                <span>Spanish</span>
                            </label>

                            <label class="text-md mr-3 flex items-center cursor-pointer space-x-2">
                                <input type="checkbox" name="languages[]" value="French" class="peer hidden" @checked(in_array('French', $workerLanguages))>
                                <div
                                    class="w-5 h-5 border border-gray-300 rounded bg-white peer-checked:bg-[#FF71A6] peer-checked:after:content-['✓'] peer-checked:after:text-white peer-checked:after:text-sm peer-checked:after:flex peer-checked:after:justify-center peer-checked:after:items-center peer-checked:after:h-full peer-checked:after:w-full peer-checked:after:font-bold">
                                </div>
                                <span>French</span>
                            </label>

                        </div>
                        @error('languages')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="languages" class="text-md mb-1 block">Bio</label>
                        <textarea name="bio" id="" cols="30" rows="10" class="border w-full p-2"
                            placeholder="Write your bio which defined your skilled and experienced">{{ Auth::user()->bio }}</textarea>
                        @error('bio')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="grid sm:grid-cols-2 gap-5">
                        <div class="mb-3">
                            <label for="price" class="text-md mb-1">Price</label>
                            <input type="number" min="1" step="any" id="price" name="price"
                                class="w-full border rounded p-2" placeholder="Enter price" required>
                            @error('price')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="image" class="text-md mb-1">Profile Image</label>
                            <input type="file" accept="image/jpg, image/jpeg, image/png" id="image" name="image"
                                class="w-full border rounded p-2" placeholder="Enter price" required>
                            @error('image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="create-button-container">
                        <button type="submit"
                            class="bg-[#FF71A6] hover:bg-white hover:text-[#FF71A6] border border-[#FF71A6] px-12 py-3 text-white rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
