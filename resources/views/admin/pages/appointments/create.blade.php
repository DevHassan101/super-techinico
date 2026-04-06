@extends('admin.layouts.app')
@section('page-title', 'Create Workers')
@section('title', 'Create Workers')
@section('content')
    <div class="content-wrapper">
        <a href="{{ route('workers.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="28"
                viewBox="0 0 32 28" fill="none">
                <path d="M2 14L30 14M2 14L14 2M2 14L14 26" stroke="#FF71A6" stroke-width="4" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
        <div class="content-card md:mt-[auto] mt-[20px]">
            <div class="create-form-container">
                <form action="{{ route('workers.store') }}" method="POST">
                    @csrf
                    <div class="create-form-group">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Maddy Dany"
                            required>
                    </div>

                    <div class="create-form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="example@domain.com" required>
                    </div>

                    <div class="create-form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="create-form-group">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="create-form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price"
                            required>
                    </div>

                    <div class="create-form-group">
                        <label for="position" class="form-label">Position</label>
                        <select id="position" name="position" class="form-select" required>
                            <option value="" selected>Select</option>
                            <option value="electrician">Electrician</option>
                            <option value="plumber">Plumber</option>
                            <option value="locksmith">Locksmith</option>
                            <option value="gardener">Gardener</option>
                            <option value="painter">Painter</option>
                        </select>
                    </div>

                    <div class="create-button-container">
                        <button type="submit" class="btn btn-primary bg-[#FF71A6] px-12 py-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
