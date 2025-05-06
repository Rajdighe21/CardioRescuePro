<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\DynamicDBService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AssessmentController extends Controller
{

    protected  $DynamicDBService;

    public function __construct(DynamicDBService $DynamicDBService)
    {
        $this->DynamicDBService = $DynamicDBService;
    }


    public function index()
    {

        try {
            $this->DynamicDBService->setConnection();
            $users = DB::table('patient_registrations')
                ->leftJoin('assessments', 'patient_registrations.id', '=', 'assessments.patient_id')
                ->leftJoin('doctors', 'assessments.doctor_id', '=', 'doctors.id')
                ->select(
                    'patient_registrations.*',
                    'assessments.id as assessment_id',
                    'assessments.status as assessment_status',
                    'doctors.name as doctor_name'
                )
                ->get();

            $doctors = DB::table('doctors')->get();
        } catch (\Exception $e) {
            DB::setDefaultConnection(env('DB_CONNECTION', 'mysql'));
            $users = DB::table('users')->where('role', 'patients')->get();
        }

        // return $users;


        return view('assessment.assign', compact('users', 'doctors'));
    }

    public function show()
    {
        $authUser = Auth::user();
        if ($authUser->role === 'admin' || $authUser->role === 'super_admin' || $authUser->role === 'doctor') {
            try {
                // Set dynamic tenant connection
                $this->DynamicDBService->setConnection();

                // Fetch assessment data with doctor and patient names
                $assessments = DB::table('assessments')
                    ->join('doctors', 'assessments.doctor_id', '=', 'doctors.id')
                    ->join('patient_registrations', 'assessments.patient_id', '=', 'patient_registrations.id')
                    ->select(
                        'assessments.*',
                        'doctors.name as doctor_name',
                        'patient_registrations.name as patient_name',
                        'patient_registrations.user_number as patient_number'
                    )
                    ->get();
            } catch (\Exception $e) {
                // Optional fallback or logging
                Log::error('Failed to load assessments from tenant DB: ' . $e->getMessage());
            }
        }

        // return $assessments;

        return view('assessment.index', compact('assessments'));
    }

    public function create($id)
    {
        $this->DynamicDBService->setConnection();
        $assessment = DB::table('assessments')
            ->join('patient_registrations', 'assessments.patient_id', '=', 'patient_registrations.id')
            ->join('doctors', 'assessments.doctor_id', '=', 'doctors.id')
            ->select(
                'assessments.*',
                'patient_registrations.name as patient_name',
                'patient_registrations.user_number as patient_number',
                'doctors.name as doctor_name'
            )
            ->where('assessments.id', $id)
            ->first();
        //   return $assessment;
        return view('assessment.create', compact('assessment'));
    }

    public function store(Request $request, $id)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string',
            'diagnosis' => 'required',
            'current_status' => 'required',
            'surgical_history' => 'required',
            'medical_history' => 'required',
            'treatment_protocol' => 'required',
            'cervical_flexion' => 'required',
            'cervical_extension' => 'required',
            'cervical_sideFlexion' => 'required',
            'cervical_rotation' => 'required',
            'shoulder_side' => 'required',
            'shoulder_flexion' => 'required',
            'shoulder_extension' => 'required',
            'shoulder_adduction' => 'required',
            'shoulder_abduction' => 'required',
            'elbow_side' => 'required',
            'elbow_flexion' => 'required',
            'elbow_extension' => 'required ',
            'wrist_side' => 'required ',
            'wrist_flexion' => 'required ',
            'wrist_extension' => 'required ',
            'ulnar_deviation' => 'required ',
            'radial_deviation' => 'required ',
            'hip_side' => 'required ',
            'hip_flexion' => 'required ',
            'hip_extension' => 'required ',
            'hip_adduction' => 'required ',
            'hip_abduction' => 'required ',
            'knee_side' => 'required ',
            'knee_flexion' => 'required ',
            'knee_extension' => 'required ',
            'ankle_side' => 'required ',
            'dorsiflexion' => 'required ',
            'plantarflexion' => 'required ',
            'mmt' => 'required ',
            'met' => 'required ',
            'rt_upper_limb' => 'required ',
            'lt_upper_limb' => 'required ',
            'rt_lower_limb' => 'required ',
            'lt_lower_limb' => 'required ',
            'bisceps_reflexes' => 'required',
            'triceps_reflex' => 'required',
            'brachioradialis_reflexes' => 'required',
            'knee_reflexes' => 'required',
            'ankle_reflexes' => 'required',
            'plantar_reflexes' => 'required',
            'balence_reflexes' => 'required ',
            'special_test' => 'required ',
            'pain_muscle_tone' => 'required ',
            'touch_muscle_tone' => 'required ',
            'temp_muscle_tone' => 'required ',
            'two_point_discrimination' => 'required ',
            'baragnosis_muscle_tone' => 'required ',
            'stregnosis_muscle_tone' => 'required ',
            'gait' => 'required ',
            'limb' => 'required ',
        ]);

        $this->DynamicDBService->setConnection();

        $assessment = DB::table('assessments')->where('id', $id)->first();

        // Check if the assessment exists
        if (!$assessment) {
            return redirect()->back()->with('error', 'Assessment not found.');
        }

        // Update the assessment record
        DB::table('assessments')->where('id', $id)->update([
            'patient_id' => $assessment->patient_id,
            'doctor_id' => $assessment->doctor_id,
            'status' => 'completed',

            // If you have any updated data, replace these with actual input data:
            'diagnosis' => $request->diagnosis ?? '',
            'app_date' => now(),
            'treatment_protocol' => $request->treatment_protocol ?? '',
            'current_status' => $request->current_status ?? '',
            'surgical_history' => $request->surgical_history ?? '',
            'medical_history' => $request->medical_history ?? '',

            // Cervical
            'cervical_flexion' => $request->cervical_flexion ?? '',
            'cervical_extension' => $request->cervical_extension ?? '',
            'cervical_sideFlexion' => $request->cervical_sideFlexion ?? '',
            'cervical_rotation' => $request->cervical_rotation ?? '',

            // Shoulder
            'shoulder_side' => $request->shoulder_side ?? '',
            'shoulder_flexion' => $request->shoulder_flexion ?? '',
            'shoulder_extension' => $request->shoulder_extension ?? '',
            'shoulder_adduction' => $request->shoulder_adduction ?? '',
            'shoulder_abduction' => $request->shoulder_abduction ?? '',

            // Elbow
            'elbow_side' => $request->elbow_side ?? '',
            'elbow_flexion' => $request->elbow_flexion ?? '',
            'elbow_extension' => $request->elbow_extension ?? '',

            // Wrist
            'wrist_side' => $request->wrist_side ?? '',
            'wrist_flexion' => $request->wrist_flexion ?? '',
            'wrist_extension' => $request->wrist_extension ?? '',
            'ulnar_deviation' => $request->ulnar_deviation ?? '',
            'radial_deviation' => $request->radial_deviation ?? '',

            // Hip
            'hip_side' => $request->hip_side ?? '',
            'hip_flexion' => $request->hip_flexion ?? '',
            'hip_extension' => $request->hip_extension ?? '',
            'hip_adduction' => $request->hip_adduction ?? '',
            'hip_abduction' => $request->hip_abduction ?? '',

            // Knee
            'knee_side' => $request->knee_side ?? '',
            'knee_flexion' => $request->knee_flexion ?? '',
            'knee_extension' => $request->knee_extension ?? '',

            // Ankle
            'ankle_side' => $request->ankle_side ?? '',
            'dorsiflexion' => $request->dorsiflexion ?? '',
            'plantarflexion' => $request->plantarflexion ?? '',

            // Reflexes & Other
            'mmt' => $request->mmt ?? '',
            'met' => $request->met ?? '',
            'rt_upper_limb' => $request->rt_upper_limb ?? '',
            'lt_upper_limb' => $request->lt_upper_limb ?? '',
            'rt_lower_limb' => $request->rt_lower_limb ?? '',
            'lt_lower_limb' => $request->lt_lower_limb ?? '',
            'bisceps_reflexes' => $request->bisceps_reflexes ?? '',
            'triceps_reflex' => $request->triceps_reflex ?? '',
            'brachioradialis_reflexes' => $request->brachioradialis_reflexes ?? '',
            'knee_reflexes' => $request->knee_reflexes ?? '',
            'ankle_reflexes' => $request->ankle_reflexes ?? '',
            'plantar_reflexes' => $request->plantar_reflexes ?? '',
            'balence_reflexes' => $request->balence_reflexes ?? '',
            'special_test' => $request->special_test ?? '',

            // Muscle tone
            'pain_muscle_tone' => $request->pain_muscle_tone ?? '',
            'touch_muscle_tone' => $request->touch_muscle_tone ?? '',
            'temp_muscle_tone' => $request->temp_muscle_tone ?? '',
            'two_point_discrimination' => $request->two_point_discrimination ?? '',
            'baragnosis_muscle_tone' => $request->baragnosis_muscle_tone ?? '',
            'stregnosis_muscle_tone' => $request->stregnosis_muscle_tone ?? '',

            // Others
            'gait' => $request->gait ?? '',
            'limb' => $request->limb ?? '',
            'updated_at' => now(),
        ]);

        // Redirect back with success message
        return redirect()->route('assessment.show')->with('success', 'Assessment updated successfully!');
    }

    public function assignStore(Request $request)
    {

        $branch_code = Auth::user()->branch_code;
        $branch = Branch::where('branch_code', $branch_code)->first();
        $database_name = $branch->database_name;

        $this->DynamicDBService->setConnection($database_name, 'branch_temp');

        // Manual validation using Rule::exists for dynamic DB
        $request->validate([
            'user_number' => [
                'required',
                Rule::exists('patient_registrations', 'user_number'),
            ],
            'doctor_number' => [
                'required',
                Rule::exists('doctors', 'user_number'),
            ],
            'assessment_date' => 'required|date',
            'message' => 'required|string',
        ]);

        // Get patient
        $patient = DB::table('patient_registrations')->where('user_number', $request->user_number)->first();

        // Get doctor
        $doctor = DB::table('doctors')->where('user_number', $request->doctor_number)->first();

        if (!$patient || !$doctor) {
            return back()->with('error', 'Invalid patient or doctor.');
        }

        // Check if assessment already exists
        $exists = DB::table('assessments')
            ->where('patient_id', $patient->id)
            ->where('doctor_id', $doctor->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Assessment already assigned.');
        }

        // Store assessment
        DB::table('assessments')->insert([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'assessment_date' => $request->assessment_date,
            'message' => $request->message,
            'status' => 'pending',

            'diagnosis' => '',
            'treatment_protocol' => '',
            'surgical_history' => '',
            'medical_history' => '',

            // Cervical
            'cervical_flexion' => '',
            'cervical_extension' => '',
            'cervical_sideFlexion' => '',
            'cervical_rotation' => '',

            // Shoulder
            'shoulder_side' => '',
            'shoulder_flexion' => '',
            'shoulder_extension' => '',
            'shoulder_adduction' => '',
            'shoulder_abduction' => '',

            // Elbow
            'elbow_side' => '',
            'elbow_flexion' => '',
            'elbow_extension' => '',

            // Wrist
            'wrist_side' => '',
            'wrist_flexion' => '',
            'wrist_extension' => '',
            'ulnar_deviation' => '',
            'radial_deviation' => '',

            // Hip
            'hip_side' => '',
            'hip_flexion' => '',
            'hip_extension' => '',
            'hip_adduction' => '',
            'hip_abduction' => '',

            // Knee
            'knee_side' => '',
            'knee_flexion' => '',
            'knee_extension' => '',

            // Ankle
            'ankle_side' => '',
            'dorsiflexion' => '',
            'plantarflexion' => '',

            // Reflexes & Other
            'mmt' => '',
            'met' => '',
            'rt_upper_limb' => '',
            'lt_upper_limb' => '',
            'rt_lower_limb' => '',
            'lt_lower_limb' => '',
            'bisceps_reflexes' => '',
            'triceps_reflex' => '',
            'brachioradialis_reflexes' => '',
            'knee_reflexes' => '',
            'ankle_reflexes' => '',
            'plantar_reflexes' => '',
            'balence_reflexes' => '',
            'special_test' => '',

            // Muscle tone
            'pain_muscle_tone' => '',
            'touch_muscle_tone' => '',
            'temp_muscle_tone' => '',
            'two_point_discrimination' => '',
            'baragnosis_muscle_tone' => '',
            'stregnosis_muscle_tone' => '',

            // Others
            'gait' => '',
            'limb' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Assessment Asseign successfully.');
        // dd($request->all());
    }
}
