@extends('admin.layouts.app')
@section('page-title', 'Edit Worker')
@section('title', 'Edit Worker')
@section('content')
    <div class="content-wrapper">
        <a href="{{ route('admin.workers.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="28"
                viewBox="0 0 32 28" fill="none">
                <path d="M2 14L30 14M2 14L14 2M2 14L14 26" stroke="#FF71A6" stroke-width="4" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
        <div class="content-card md:mt-[auto] mt-[20px]">
            <div class="create-form-container">
                <form action="{{ route('admin.workers.update', ['worker' => $worker]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="create-form-group">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" id="fullName" name="name" class="form-control" placeholder="Maddy Dany"
                            value="{{ old('name', $worker->name) }}" required>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ old('email', $worker->email) }}" placeholder="example@domain.com" required>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter your password">
                            <button type="button" onclick="togglePassword(this, 'password')" data-status="text"
                                class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#ff74a8]">
                                <i class="fa-regular fa-eye-slash" id="icon-password"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Enter your password">
                            <button type="button" onclick="togglePassword(this, 'password_confirmation')" data-status="text"
                                class="absolute inset-y-0 end-2 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#ff74a8]">
                                <i class="fa-regular fa-eye-slash" id="icon-password_confirmation"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="position" class="form-label">Position</label>
                        <select id="position" name="position" class="form-select border-[#FF71A6] bg-transparent" required>
                            <option value="" selected>Select</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" @selected($position->id == $worker->position_id)>{{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('position')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" name="location" class="form-select border-[#FF71A6] bg-transparent" required>
                            <option value="" selected>Select</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" @selected($location->id == $worker->location_id)>{{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('location')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="1" step="any" id="price" name="price" max="1500"
                            class="form-control" placeholder="Enter price" required
                            value="{{ old('price', $worker->price) }}">
                        @error('price')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="create-form-group">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="image" name="image"
                            class="form-control" placeholder="Enter price">
                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="create-button-container">
                        <button type="submit" class="btn btn-primary bg-[#FF71A6] px-12 py-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
