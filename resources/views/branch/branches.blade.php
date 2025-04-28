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
                        <h3 class="mb-0">New Branch</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Branch</li>
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
                            <div class="card-title">Branch Registration</div>
                        </div>
                        <form action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Branch Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter branch name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <select class="form-select" name="location" id="location" required>
                                        <option selected disabled value="">Select a Location</option>
                                        <option value="Mumbai" {{ old('location') == 'Mumbai' ? 'selected' : '' }}>Mumbai
                                        </option>
                                        <option value="Vapi" {{ old('location') == 'Vapi' ? 'selected' : '' }}>Vapi
                                        </option>
                                        <option value="Pune" {{ old('location') == 'Pune' ? 'selected' : '' }}>Pune
                                        </option>
                                        <option value="Nashik" {{ old('location') == 'Nashik' ? 'selected' : '' }}>Nashik
                                        </option>
                                        <option value="Surat" {{ old('location') == 'Surat' ? 'selected' : '' }}>Surat
                                        </option>
                                    </select>
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="admin@gmail.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="branch_code" class="form-label">Branch Code <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="branch_prefix" id="branch_prefix"
                                            value="{{ old('branch_prefix') }}" style="max-width: 60px;" required>
                                        <input type="text" class="form-control" name="branch_code" id="branch_code"
                                            value="{{ old('branch_code', date('Y') . $branch_id) }}" required readonly>
                                        @error('branch_prefix')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="admin_name" class="form-label">Admin Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="admin_name" id="admin_name"
                                        value="{{ old('admin_name') }}" placeholder="Enter Admin name">
                                    @error('admin_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="contact" class="form-label">Admin Contact <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="contact" id="contact"
                                        value="{{ old('contact') }}" placeholder="91+">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="branch_logo" class="form-label">Select Logo</label>
                                    <input type="file" class="form-control" name="branch_logo" id="branch_logo">
                                    @error('branch_logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date" id="date"
                                        value="{{ old('date') }}" placeholder="Enter Here">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Address<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="10" rows="2"
                                        placeholder="Enter Here">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
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

        <div class="app-content">
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-3 mb-4">
                    <div class="card-header  text-dark d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Branch Details</h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm mb-0">
                                {{ $branches->links() }}
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered text-center mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Branch Name</th>
                                    <th>Admin Name</th>
                                    <th>Contact</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($branch->image) }}" alt="Logo"
                                                class="rounded-circle border" width="50" height="50"></td>
                                        <td>{{ $branch->branch_name }}</td>
                                        <td>{{ $branch->admin->name ?? 'N/A' }}</td>
                                        <td>{{ $branch->admin->contact ?? 'N/A' }}</td>
                                        <td>{{ $branch->location }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection


@section('customJs')
    <script></script>
@endsection
