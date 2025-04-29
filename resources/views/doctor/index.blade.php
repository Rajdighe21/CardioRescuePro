@extends('layouts.app')

@section('title')
    Doctor List
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
                        <h3 class="mb-0">Doctor List</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor's</li>
                            @include('components.sweet_alert')
                        </ol>
                    </div>
                </div>
            </div>
        </div>



        <div class="app-content">
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-3 mb-4">
                    <div class="card-header text-dark d-flex justify-content-between align-items-center">

                        <!-- Dropdown on the left -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                Location
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Patients</a></li>
                                <li><a class="dropdown-item" href="#">Single Visit</a></li>
                                <li><a class="dropdown-item" href="#">Multiple Visits</a></li>
                            </ul>
                        </div>

                        <!-- Search input on the right -->
                        <div class="input-group input-group-sm ms-auto" style="width: 250px;">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th class="align-middle">Profile</th>
                                    <th class="align-middle">Dr. Name</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Contact</th>
                                    <th class="align-middle">Address</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td class="align-middle">
                                            @if ($doctor->profile_image)
                                                <img src="{{ asset('storage/' . $doctor->profile_image) }}"
                                                    alt="Profile Image" class="rounded-circle shadow"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">Dr. {{ $doctor->name }}</td>
                                        <td class="align-middle">{{ $doctor->email }}</td>
                                        <td class="align-middle">
                                            {{ $doctor->contact }} <br>
                                            <span class="text-primary">{{ $doctor->emg_contact }}</span>
                                        </td>
                                        <td class="align-middle">
                                            {{ $doctor->address }}</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary btn-sm open-assign-modal"
                                                data-toggle="modal" data-target="#formModal"
                                                data-id="{{ $doctor->user_number }}" data-name="{{ $doctor->name }}">
                                                More Info
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- Modal Structure -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title text-primary" id="formModalLabel">Name : User Name</h5>

                    <span class="text-danger" style="cursor:pointer; font-size:24px;" data-dismiss="modal"
                        aria-label="Close">
                        &times;
                    </span>

                </div>
                <div class="modal-body">
                    <form id="formModalForm" method="POST" action="">
                        @csrf

                        <input type="hidden" id="user_number" name="user_number">

                        <div class="mb-4">
                            <label for="assessment_date" class="form-label fw-bold">Assessment Date <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control rounded-3 shadow-sm" id="assessment_date"
                                name="assessment_date" required>
                        </div>

                        <div class="mb-4">
                            <label for="doctor_name" class="form-label fw-bold">Doctor's Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 shadow-sm" id="doctor_name"
                                name="doctor_name" placeholder="Enter doctor's name" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold">Message <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control rounded-3 shadow-sm" id="message" name="message" rows="4"
                                placeholder="Write your message here..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success rounded-pill shadow">Submit Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJs')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.open-assign-modal').click(function() {
                var userId = $(this).data('id');
                var userName = $(this).data('name');

                $('#user_number').val(userId);

                $('#formModalLabel').text('Name : ' + userName);
            });
        });
    </script>
@endsection
