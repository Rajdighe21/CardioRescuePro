<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DynamicDBService;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
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
                ->leftJoin('treatment_sessions', 'patient_registrations.id', '=', 'treatment_sessions.patient_id')
                ->leftJoin('doctors', 'treatment_sessions.doctor_id', '=', 'doctors.id')
                ->select(
                    'patient_registrations.*',
                    'treatment_sessions.id as session_id',
                    'treatment_sessions.status as session_status',
                    'treatment_sessions.session_number as session_number',
                    'doctors.name as doctor_name'
                )
                ->get();

            $doctors = DB::table('doctors')->get();
        } catch (\Exception $e) {
            DB::setDefaultConnection(env('DB_CONNECTION', 'mysql'));
            $users = DB::table('users')->where('role', 'patients')->get();
        }

        // return $users;
        return view('sessions.assign', compact('users', 'doctors'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'user_number' => 'required',
            'session_date' => 'required',
            'session_number' => 'required',
            'doctor_number' => 'required',
            'message' => 'required',

        ]);

        $this->DynamicDBService->setConnection();

        $patient = DB::table('patient_registrations')->where('user_number', $request->user_number)->first();
        // Get doctor
        $doctor = DB::table('doctors')->where('user_number', $request->doctor_number)->first();

        if (!$patient || !$doctor) {
            return back()->with('error', 'Invalid patient or doctor.');
        }


        $exists = DB::table('treatment_sessions')
            ->where('session_number', $request->session_number)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Session already assigned.');
        }

        DB::table('treatment_sessions')->insert([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'session_date'    => $validatedData['session_date'],
            'session_number'  => $validatedData['session_number'],
            'message'         => $validatedData['message'],
            'diagnosis' => '',
            'treatment_protocol' => '',
            'created_at'      => now(),
        ]);

        return back()->with('success', 'Session Asseign successfully.');
    }
}
