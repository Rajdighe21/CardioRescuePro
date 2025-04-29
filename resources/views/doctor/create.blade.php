@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">New Doctor</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
                            @include('components.sweet_alert')

                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card shadow-lg rounded-4 border-0 mb-5">
                        <div class="card-header ">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-person-plus-fill"> </i> Add New Doctor
                            </h5>
                        </div>

                        <form id="addDoctorForm" action="{{ route('doctor.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row g-4 p-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-bold">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control rounded-3 @error('name') is-invalid @enderror"
                                        placeholder="Enter Doctor Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                                        placeholder="Enter Doctor Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="contact" class="form-label fw-bold">Contact <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contact" id="contact"
                                        class="form-control rounded-3 @error('contact') is-invalid @enderror"
                                        placeholder="Enter Contact Number" pattern="[0-9]{10}" value="{{ old('contact') }}"
                                        required>
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="emg_contact" class="form-label fw-bold">Emergency Contact <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="emg_contact" id="emg_contact"
                                        class="form-control rounded-3 @error('contact') is-invalid @enderror"
                                        placeholder="Enter Contact Number" pattern="[0-9]{10}"
                                        value="{{ old('emg_contact') }}" required max="10">
                                    @error('emg_contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="user_number" class="form-label fw-bold">Branch Code <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="user_number" id="user_number"
                                        class="form-control rounded-3 @error('user_number') is-invalid @enderror"
                                        placeholder="Enter Branch Code" value="{{ $prefix }}" required readonly>
                                    @error('user_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="salary" class="form-label fw-bold">Salary P/M<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="salary" id="salary"
                                        class="form-control rounded-3 @error('salary') is-invalid @enderror"
                                        placeholder="Enter Salary" value="{{ old('salary') }}" required>
                                    @error('salary')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label fw-bold">Address<span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" name="address" id="address"
                                        class="form-control rounded-3 @error('address') is-invalid @enderror" placeholder="Enter Address" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="profile_image" class="form-label fw-bold">Profile Image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="profile_image" id="profile_image"
                                        class="form-control rounded-3 @error('profile_image') is-invalid @enderror"
                                        accept="image/*" required onchange="previewProfileImage(event)">
                                    @error('profile_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror


                                </div>

                                <div class="col-md-6">
                                    <label for="additional_documents" class="form-label fw-bold">Additional
                                        Documents</label>
                                    <input type="file" name="additional_documents[]" id="additional_documents"
                                        class="form-control rounded-3" multiple>
                                    <div class="form-text">
                                        You can upload multiple supporting documents (optional).
                                    </div>
                                </div>
                                <div class="col-md-6"> <div class="mt-2">
                                    <img id="profileImagePreview" src="#" alt="Profile Preview"
                                        class="img-thumbnail d-none" style="max-width: 100px;">
                                </div></div>

                            </div>

                            <div class="card-footer bg-light d-flex justify-content-end rounded-bottom-4 p-3">
                                <button type="submit" class="btn btn-success rounded-pill px-4">
                                    <i class="bi bi-save2-fill"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection


@section('customJs')
    <script>
        function previewProfileImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImagePreview');
                output.src = reader.result;
                output.classList.remove('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
