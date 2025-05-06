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
                        <h3 class="mb-0">Patient Assessment</h3>
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
                            <div class="card-title">
                                <h5 class="text-primary">Fill Form</h5>
                            </div>
                        </div>

                        <form action="{{ route('assessment.store', $assessment->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">

                                {{-- Name --}}
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter full name"
                                        value="{{ $assessment->patient_name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Dr. Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter full name"
                                        value="{{ 'Dr. ' . $assessment->doctor_name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="diagnosis" class="form-label">Diagnosis <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" rows="2" name="diagnosis"
                                        placeholder="Enter Diagnosis History" required>{{ old('diagnosis') }}</textarea>
                                    @error('diagnosis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="current_status" class="form-label">Current Status <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('current_status') is-invalid @enderror" id="current_status" rows="2"
                                        name="current_status" placeholder="Enter Current Status" required>{{ old('current_status') }}</textarea>
                                    @error('current_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="surgical_history" class="form-label">Surgical History</label>
                                    <textarea class="form-control @error('surgical_history') is-invalid @enderror" id="surgical_history" rows="2"
                                        name="surgical_history" placeholder="Enter Surgical History">{{ old('surgical_history') }}</textarea>
                                    @error('surgical_history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="medical_history" class="form-label">Medical History</label>
                                    <textarea class="form-control @error('medical_history') is-invalid @enderror" id="medical_history" rows="2"
                                        name="medical_history" placeholder="Enter Medical History">{{ old('medical_history') }}</textarea>
                                    @error('medical_history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="treatment_protocol" class="form-label">Treatment Protocol <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('treatment_protocol') is-invalid @enderror" id="treatment_protocol" rows="2"
                                        name="treatment_protocol" placeholder="Enter Treatment Protocol" required>{{ old('treatment_protocol') }}</textarea>
                                    @error('treatment_protocol')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="mb-3 col-md-3">
                                    <label for="cervical_flexion" class="form-label">Cervical Flexion</label>
                                    <input type="text" name="cervical_flexion"
                                        class="form-control @error('cervical_flexion') is-invalid @enderror"
                                        id="cervical_flexion" placeholder="Enter Flexion"
                                        value="{{ old('cervical_flexion') }}">
                                    @error('cervical_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="cervical_extension" class="form-label">Cervical Extension</label>
                                    <input type="text" name="cervical_extension"
                                        class="form-control @error('cervical_extension') is-invalid @enderror"
                                        id="cervical_extension" placeholder="Enter Extension"
                                        value="{{ old('cervical_extension') }}">
                                    @error('cervical_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="cervical_sideFlexion" class="form-label">Cervical SideFlexion</label>
                                    <input type="text" name="cervical_sideFlexion"
                                        class="form-control @error('cervical_sideFlexion') is-invalid @enderror"
                                        id="cervical_sideFlexion" placeholder="Enter SideFlexion"
                                        value="{{ old('cervical_sideFlexion') }}">
                                    @error('cervical_sideFlexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="cervical_rotation" class="form-label">Cervical Rotation</label>
                                    <input type="text" name="cervical_rotation"
                                        class="form-control @error('cervical_rotation') is-invalid @enderror"
                                        id="cervical_rotation" placeholder="Enter Rotation"
                                        value="{{ old('cervical_rotation') }}">
                                    @error('cervical_rotation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="shoulder" class="form-label">Shoulder</label>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="shoulder_left"
                                            name="shoulder_side[]" value="Left Shoulder"
                                            {{ in_array('Left Shoulder', old('shoulder_side', [])) ? 'checked' : '' }}>
                                        <label for="shoulder_left" class="custom-control-label">Left</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="shoulder_right"
                                            name="shoulder_side[]" value="Right Shoulder"
                                            {{ in_array('Right Shoulder', old('shoulder_side', [])) ? 'checked' : '' }}>
                                        <label for="shoulder_right" class="custom-control-label">Right</label>
                                    </div>
                                    @error('shoulder_side')
                                        <span class="text-danger">Please select at least one shoulder side.</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="shoulder_flexion" class="form-label">Shoulder Flexion</label>
                                    <input type="text" name="shoulder_flexion"
                                        class="form-control @error('shoulder_flexion') is-invalid @enderror"
                                        id="shoulder_flexion" placeholder="Enter Flexion"
                                        value="{{ old('shoulder_flexion') }}">
                                    @error('shoulder_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="shoulder_extension" class="form-label">Shoulder Extension</label>
                                    <input type="text" name="shoulder_extension"
                                        class="form-control @error('shoulder_extension') is-invalid @enderror"
                                        id="shoulder_extension" placeholder="Enter Extension"
                                        value="{{ old('shoulder_extension') }}">
                                    @error('shoulder_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="shoulder_adduction" class="form-label">Shoulder Adduction</label>
                                    <input type="text" name="shoulder_adduction"
                                        class="form-control @error('shoulder_adduction') is-invalid @enderror"
                                        id="shoulder_adduction" placeholder="Enter Adduction"
                                        value="{{ old('shoulder_adduction') }}">
                                    @error('shoulder_adduction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="shoulder_abduction" class="form-label">Shoulder Abduction</label>
                                    <input type="text" name="shoulder_abduction"
                                        class="form-control @error('shoulder_abduction') is-invalid @enderror"
                                        id="shoulder_abduction" placeholder="Enter Abduction"
                                        value="{{ old('shoulder_abduction') }}">
                                    @error('shoulder_abduction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Elbow Side <span class="text-danger">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="elbow_left"
                                            name="elbow_side[]" value="Left Elbow"
                                            {{ in_array('Left Elbow', old('elbow_side', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="elbow_left">Left</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="elbow_right"
                                            name="elbow_side[]" value="Right Elbow"
                                            {{ in_array('Right Elbow', old('elbow_side', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="elbow_right">Right</label>
                                    </div>
                                    @error('elbow_side')
                                        <span class="text-danger d-block">Please select at least one Elbow side.</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="elbow_flexion" class="form-label">Elbow Flexion</label>
                                    <input type="text" name="elbow_flexion"
                                        class="form-control @error('elbow_flexion') is-invalid @enderror"
                                        id="elbow_flexion" placeholder="Enter Flexion"
                                        value="{{ old('elbow_flexion') }}">
                                    @error('elbow_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="elbow_extension" class="form-label">Elbow Extension</label>
                                    <input type="text" name="elbow_extension"
                                        class="form-control @error('elbow_extension') is-invalid @enderror"
                                        id="elbow_extension" placeholder="Enter Extension"
                                        value="{{ old('elbow_extension') }}">
                                    @error('elbow_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Wrist Side <span class="text-danger">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="wrist_left"
                                            name="wrist_side[]" value="Left Wrist"
                                            {{ in_array('Left Wrist', old('wrist_side', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wrist_left">Left</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="wrist_right"
                                            name="wrist_side[]" value="Right Wrist"
                                            {{ in_array('Right Wrist', old('wrist_side', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wrist_right">Right</label>
                                    </div>
                                    @error('wrist_side')
                                        <span class="text-danger d-block">Please select at least one Wrist side.</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="wrist_flexion" class="form-label">Wrist Flexion</label>
                                    <input type="text" name="wrist_flexion"
                                        class="form-control @error('wrist_flexion') is-invalid @enderror"
                                        id="wrist_flexion" placeholder="Enter Flexion"
                                        value="{{ old('wrist_flexion') }}">
                                    @error('wrist_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="wrist_extension" class="form-label">Wrist Extension</label>
                                    <input type="text" name="wrist_extension"
                                        class="form-control @error('wrist_extension') is-invalid @enderror"
                                        id="wrist_extension" placeholder="Enter Extension"
                                        value="{{ old('wrist_extension') }}">
                                    @error('wrist_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="ulnar_deviation" class="form-label">Ulnar Deviation</label>
                                    <input type="text" name="ulnar_deviation"
                                        class="form-control @error('ulnar_deviation') is-invalid @enderror"
                                        id="ulnar_deviation" placeholder="Enter Deviation"
                                        value="{{ old('ulnar_deviation') }}">
                                    @error('ulnar_deviation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="radial_deviation" class="form-label">Radial Deviation</label>
                                    <input type="text" name="radial_deviation"
                                        class="form-control @error('radial_deviation') is-invalid @enderror"
                                        id="radial_deviation" placeholder="Enter Deviation"
                                        value="{{ old('radial_deviation') }}">
                                    @error('radial_deviation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <!-- Hip Side Selection -->
                                <div class="mb-3 col-md-3">
                                    <label for="hip_side" class="form-label">Hip Side <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hip_left" name="hip_side[]"
                                            value="Left Hip"
                                            {{ in_array('Left Hip', old('hip_side', [])) ? 'checked' : '' }}>
                                        <label for="hip_left" class="form-check-label">Left</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hip_right" name="hip_side[]"
                                            value="Right Hip"
                                            {{ in_array('Right Hip', old('hip_side', [])) ? 'checked' : '' }}>
                                        <label for="hip_right" class="form-check-label">Right</label>
                                    </div>
                                    @error('hip_side')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hip Flexion -->
                                <div class="mb-3 col-md-3">
                                    <label for="hip_flexion" class="form-label">Hip Flexion</label>
                                    <input type="text" name="hip_flexion" id="hip_flexion"
                                        class="form-control @error('hip_flexion') is-invalid @enderror"
                                        placeholder="Enter Flexion" value="{{ old('hip_flexion') }}">
                                    @error('hip_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hip Extension -->
                                <div class="mb-3 col-md-3">
                                    <label for="hip_extension" class="form-label">Hip Extension</label>
                                    <input type="text" name="hip_extension" id="hip_extension"
                                        class="form-control @error('hip_extension') is-invalid @enderror"
                                        placeholder="Enter Extension" value="{{ old('hip_extension') }}">
                                    @error('hip_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hip Adduction -->
                                <div class="mb-3 col-md-3">
                                    <label for="hip_adduction" class="form-label">Hip Adduction</label>
                                    <input type="text" name="hip_adduction" id="hip_adduction"
                                        class="form-control @error('hip_adduction') is-invalid @enderror"
                                        placeholder="Enter Adduction" value="{{ old('hip_adduction') }}">
                                    @error('hip_adduction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hip Abduction -->
                                <div class="mb-3 col-md-3">
                                    <label for="hip_abduction" class="form-label">Hip Abduction</label>
                                    <input type="text" name="hip_abduction" id="hip_abduction"
                                        class="form-control @error('hip_abduction') is-invalid @enderror"
                                        placeholder="Enter Abduction" value="{{ old('hip_abduction') }}">
                                    @error('hip_abduction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>

                                <!-- Knee Side Selection -->
                                <div class="mb-3 col-md-3">
                                    <label for="knee_side" class="form-label">Knee Side <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="left_knee"
                                            name="knee_side[]" value="Left Knee"
                                            {{ in_array('Left Knee', old('knee_side', [])) ? 'checked' : '' }}>
                                        <label for="left_knee" class="form-check-label">Left</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="knee_right"
                                            name="knee_side[]" value="Right Knee"
                                            {{ in_array('Right Knee', old('knee_side', [])) ? 'checked' : '' }}>
                                        <label for="knee_right" class="form-check-label">Right</label>
                                    </div>
                                    @error('knee_side')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Knee Flexion -->
                                <div class="mb-3 col-md-4">
                                    <label for="knee_flexion" class="form-label">Knee Flexion</label>
                                    <input type="text" name="knee_flexion" id="knee_flexion"
                                        class="form-control @error('knee_flexion') is-invalid @enderror"
                                        placeholder="Enter Flexion" value="{{ old('knee_flexion') }}">
                                    @error('knee_flexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Knee Extension -->
                                <div class="mb-3 col-md-4">
                                    <label for="knee_extension" class="form-label">Knee Extension</label>
                                    <input type="text" name="knee_extension" id="knee_extension"
                                        class="form-control @error('knee_extension') is-invalid @enderror"
                                        placeholder="Enter Extension" value="{{ old('knee_extension') }}">
                                    @error('knee_extension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Ankle Side -->
                                <div class="mb-3 col-md-3">
                                    <label for="ankle_side" class="form-label">Ankle Side <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="ankle_left"
                                            name="ankle_side[]" value="Left Ankle"
                                            {{ in_array('Left Ankle', old('ankle_side', [])) ? 'checked' : '' }}>
                                        <label for="ankle_left" class="form-check-label">Left</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="ankle_right"
                                            name="ankle_side[]" value="Right Ankle"
                                            {{ in_array('Right Ankle', old('ankle_side', [])) ? 'checked' : '' }}>
                                        <label for="ankle_right" class="form-check-label">Right</label>
                                    </div>
                                    @error('ankle_side')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Dorsiflexion -->
                                <div class="mb-3 col-md-4">
                                    <label for="dorsiflexion" class="form-label">Dorsiflexion</label>
                                    <input type="text" name="dorsiflexion" id="dorsiflexion"
                                        class="form-control @error('dorsiflexion') is-invalid @enderror"
                                        placeholder="Enter Dorsiflexion" value="{{ old('dorsiflexion') }}">
                                    @error('dorsiflexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Plantarflexion -->
                                <div class="mb-3 col-md-4">
                                    <label for="plantarflexion" class="form-label">Plantarflexion</label>
                                    <input type="text" name="plantarflexion" id="plantarflexion"
                                        class="form-control @error('plantarflexion') is-invalid @enderror"
                                        placeholder="Enter Plantarflexion" value="{{ old('plantarflexion') }}">
                                    @error('plantarflexion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="mb-3 col-md-6">
                                    <label>MMT (Manual Muscle Testing)</label>
                                    <textarea class="form-control @error('mmt') is-invalid @enderror" rows="2" name="mmt"
                                        placeholder="Enter Manual Muscle Testing">{{ old('mmt') }}</textarea>
                                    @error('mmt')
                                        <span class="text-danger" id="mmt-error">Enter Manual Muscle Testing Details</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>MET (Muscle Energy Technique)</label>
                                    <textarea class="form-control @error('met') is-invalid @enderror" rows="2" name="met"
                                        placeholder="Enter Gradings">{{ old('met') }}</textarea>
                                    @error('met')
                                        <span class="text-danger" id="met-error">Enter Muscle Energy Technique Details</span>
                                    @enderror
                                </div>

                                @php
                                    $limbs = [
                                        ['name' => 'rt_upper_limb', 'label' => 'Right Upper Limb'],
                                        ['name' => 'lt_upper_limb', 'label' => 'Left Upper Limb'],
                                        ['name' => 'rt_lower_limb', 'label' => 'Right Lower Limb'],
                                        ['name' => 'lt_lower_limb', 'label' => 'Left Lower Limb'],
                                    ];
                                @endphp

                                @foreach ($limbs as $limb)
                                    <div class="mb-3 col-md-3">
                                        <label for="{{ $limb['name'] }}">{{ $limb['label'] }}</label>
                                        <input type="text" name="{{ $limb['name'] }}"
                                            class="form-control @error($limb['name']) is-invalid @enderror"
                                            id="{{ $limb['name'] }}" value="{{ old($limb['name']) }}"
                                            placeholder="Enter Muscle Tone">
                                        @error($limb['name'])
                                            <span class="text-danger" id="{{ $limb['name'] }}-error">The
                                                {{ $limb['label'] }} field is required.</span>
                                        @enderror
                                    </div>
                                @endforeach
                                <hr>
                                <div class=" col-md-12">
                                    <h4 class="text-primary">Reflexes</h4>
                                </div>

                                @php
                                    $reflexes = [
                                        'bisceps_reflexes' => 'Bisceps',
                                        'triceps_reflex' => 'Triceps',
                                        'brachioradialis_reflexes' => 'Brachioradialis',
                                        'knee_reflexes' => 'Knee',
                                        'ankle_reflexes' => 'Ankle',
                                        'plantar_reflexes' => 'Plantar',
                                    ];
                                @endphp

                                @foreach ($reflexes as $name => $label)
                                    <div class="mb-3 col-md-2">
                                        <label class="mb-3">{{ $label }}</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio"
                                                id="{{ $name }}_absent" name="{{ $name }}"
                                                value="Absent" {{ old($name) === 'Absent' ? 'checked' : '' }}>
                                            <label for="{{ $name }}_absent"
                                                class="custom-control-label">Absent</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio"
                                                id="{{ $name }}_present" name="{{ $name }}"
                                                value="Present" {{ old($name) === 'Present' ? 'checked' : '' }}>
                                            <label for="{{ $name }}_present"
                                                class="custom-control-label">Present</label>
                                        </div>
                                        @error($name)
                                            <span class="text-danger"
                                                id="{{ $name }}-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="mb-3 col-md-6">
                                    <label>Balance</label>
                                    <textarea class="form-control @error('balence_reflexes') is-invalid @enderror" rows="2"
                                        name="balence_reflexes" placeholder="Romberg Test">{{ old('balence_reflexes') }}</textarea>
                                    @error('balence_reflexes')
                                        <span class="text-danger" id="balence_reflexes-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Special Test</label>
                                    <textarea class="form-control @error('special_test') is-invalid @enderror" rows="2" name="special_test"
                                        placeholder="Enter Test">{{ old('special_test') }}</textarea>
                                    @error('special_test')
                                        <span class="text-danger" id="special_test-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <h4 class="text-primary">Sensaction</h4>
                                </div>

                                <div class=" col-md-12">
                                    <h5>(A) Superficial</h5>
                                </div>

                                @php
                                    $fields = [
                                        'pain_muscle_tone' => 'Pain',
                                        'touch_muscle_tone' => 'Touch',
                                        'temp_muscle_tone' => 'Temperature',
                                        'two_point_discrimination' => '2 Point Discrimination',
                                    ];
                                @endphp

                                @foreach ($fields as $name => $label)
                                    <div class="mb-3 col-md-3">
                                        <label for="{{ $name }}">{{ $label }}</label>
                                        <input type="text" name="{{ $name }}" id="{{ $name }}"
                                            value="{{ old($name) }}" placeholder="Enter {{ $label }}"
                                            class="form-control @error($name) is-invalid @enderror">
                                        @error($name)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="col-md-12">
                                    <h5>(B) Combined Cortical</h5>
                                </div>

                                @php
                                    $combinedFields = [
                                        'baragnosis_muscle_tone' => 'Baragnosis',
                                        'stregnosis_muscle_tone' => 'Stereognosis',
                                    ];
                                @endphp

                                @foreach ($combinedFields as $name => $label)
                                    <div class="mb-3 col-md-6">
                                        <label for="{{ $name }}">{{ $label }}</label>
                                        <input type="text" name="{{ $name }}" id="{{ $name }}"
                                            value="{{ old($name) }}" placeholder="Enter {{ $label }}"
                                            class="form-control @error($name) is-invalid @enderror">
                                        @error($name)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="mb-3 col-md-6">
                                    <label for="gait">Gait</label>
                                    <textarea name="gait" id="gait" rows="2" placeholder="Romberg Test"
                                        class="form-control @error('gait') is-invalid @enderror">{{ old('gait') }}</textarea>
                                    @error('gait')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="limb">Limb Length & Limb Girth</label>
                                    <textarea name="limb" id="limb" rows="2" placeholder="Enter Limb Test"
                                        class="form-control @error('limb') is-invalid @enderror">{{ old('limb') }}</textarea>
                                    @error('limb')
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
    <script></script>
@endsection
