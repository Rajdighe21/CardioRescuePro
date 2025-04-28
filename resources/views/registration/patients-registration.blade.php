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
                        <h3 class="mb-0">New Registration</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            @include('components.sweet_alert')

                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Patient Registration</div>
                        </div>

                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">

                                {{-- User Number --}}
                                <div class="mb-3 col-md-6">
                                    <label for="userNumber" class="form-label">User Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="userNumber"
                                        class="form-control @error('userNumber') is-invalid @enderror" id="userNumber"
                                        value="{{ old('userNumber', $prefix) }}">
                                    @error('userNumber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Name --}}
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter full name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Enter E-mail"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Contact --}}
                                <div class="mb-3 col-md-6">
                                    <label for="contact" class="form-label">Contact <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('contact') is-invalid @enderror"
                                        name="contact" id="contact" placeholder="91+" value="{{ old('contact') }}">
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Gender --}}
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderMale"
                                                value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderMale"> Male </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                                                value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderFemale"> Female </label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Age --}}
                                <div class="mb-3 col-md-3">
                                    <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                                    <input type="number" name="age"
                                        class="form-control @error('age') is-invalid @enderror" id="age"
                                        value="{{ old('age') }}">
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- First Payment --}}
                                <div class="mb-3 col-md-6">
                                    <label for="firstPayment" class="form-label">First Payment <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="firstPayment"
                                        class="form-control @error('firstPayment') is-invalid @enderror" id="firstPayment"
                                        value="{{ old('firstPayment') }}">
                                    @error('firstPayment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Due Payment --}}
                                <div class="mb-3 col-md-6">
                                    <label for="duePayment" class="form-label">Due Payment <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="duePayment"
                                        class="form-control @error('duePayment') is-invalid @enderror" id="duePayment"
                                        value="{{ old('duePayment') }}">
                                    @error('duePayment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Date --}}
                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror" id="date"
                                        value="{{ old('date') }}">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Image --}}
                                <div class="mb-3 col-md-6">
                                    <label for="userImage" class="form-label">Select Image</label>
                                    <input type="file" name="userImage"
                                        class="form-control @error('userImage') is-invalid @enderror" id="userImage">
                                    @error('userImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" style="height: 75px;"
                                        placeholder="Enter Here">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Describe Problem --}}
                                <div class="mb-3 col-md-6">
                                    <label for="patintProblem" class="form-label">Describe a problem <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('patintProblem') is-invalid @enderror" name="patintProblem"
                                        style="height: 75px;" placeholder="Enter Here">{{ old('patintProblem') }}</textarea>
                                    @error('patintProblem')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Location (Checkboxes must be array) --}}
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location <span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex gap-3">
                                        <div>
                                            <input type="checkbox" name="location" class="form-check-input"
                                                id="locationMumbai" value="Mumbai"
                                                {{ old('location') == 'Mumbai' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="locationMumbai">Mumbai</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="location" class="form-check-input"
                                                id="locationVapi" value="Vapi"
                                                {{ old('location') == 'Vapi' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="locationVapi">Vapi</label>
                                        </div>
                                    </div>
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <div class="d-flex gap-3">
                                        <div>
                                            <input type="radio" class="form-check-input" name="status"
                                                id="statusPending" value="Pending"
                                                {{ old('status') == 'Pending' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusPending">Pending</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="form-check-input" name="status"
                                                id="statusClicked" value="Clicked"
                                                {{ old('status') == 'Clicked' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusClicked">Clicked</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="form-check-input" name="status"
                                                id="statusCancelled" value="Cancelled"
                                                {{ old('status') == 'Cancelled' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusCancelled">Cancelled</label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Medication --}}
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Patient any medication, currently?</label>
                                    <div class="d-flex gap-3">
                                        <div>
                                            <input type="radio" class="form-check-input" name="medication"
                                                id="medicationYes" value="yes"
                                                {{ old('medication') == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="medicationYes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="form-check-input" name="medication"
                                                id="medicationNo" value="no"
                                                {{ old('medication') == 'no' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="medicationNo">No</label>
                                        </div>
                                    </div>
                                    @error('medication')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Medicine List --}}
                                <div class="mb-3 col-md-6" id="medicineListContainer" style="display: none;">
                                    <label for="medicineList" class="form-label">Medicine List</label>
                                    <textarea class="form-control @error('medicineList') is-invalid @enderror" name="medicineList" id="medicineList"
                                        style="height: 75px;" placeholder="Enter Here">{{ old('medicineList') }}</textarea>
                                    @error('medicineList')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        // TEXT AREA HIDE AND SHOW
        document.addEventListener('DOMContentLoaded', function() {
            const medicationYes = document.getElementById('medicationYes');
            const medicationNo = document.getElementById('medicationNo');
            const medicineListContainer = document.getElementById('medicineListContainer');

            medicationYes.addEventListener('change', function() {
                if (this.checked) {
                    medicineListContainer.style.display = 'block';
                }
            });

            medicationNo.addEventListener('change', function() {
                if (this.checked) {
                    medicineListContainer.style.display = 'none';
                }
            });
        });
    </script>
@endsection
