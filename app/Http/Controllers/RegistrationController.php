<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Services\DynamicDBService;
use Illuminate\Support\Facades\DB;
use App\Models\PatientRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class RegistrationController extends Controller
{
    protected  $DynamicDBService;

    public function __construct(DynamicDBService $DynamicDBService)
    {
        $this->DynamicDBService = $DynamicDBService;
    }

    public function index()
    {

        $branch_code = Auth::user()->branch_code;
        $branch = Branch::where('branch_code', $branch_code)->first();
        $database_name = $branch->database_name;


        try {
            $this->DynamicDBService->setConnection($database_name);
            $users = DB::table('patient_registrations')->get();

        } catch (\Exception $e) {
            DB::setDefaultConnection(env('DB_CONNECTION', 'mysql'));
            $users = DB::table('users')->where('role', 'patients')->get();
        }
// return $users;
        return view('registration.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = User::orderBy('id', 'desc')->pluck('id')->first();
        $branchPrifix = Auth::user()->branch_code;
        $prefix = substr($branchPrifix, 0, 2) . date('Y') . '00' . $userId;
        return view('registration.patients-registration', compact('prefix'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'userNumber' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required',
            'contact' => 'required|digits:10',
            'gender' => 'required',
            'age' => 'required|integer',
            'firstPayment' => 'required|numeric',
            'duePayment' => 'required|numeric',
            'date' => 'required|date',
            'userImage' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string',
            'patintProblem' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'medication' => 'required',
            'medicineList' => 'nullable|string',
        ]);


        $StoreUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'branch_code' => $request->userNumber,
            'password' => Hash::make($request->contact),
        ]);


        $branch_code = Auth::user()->branch_code;
        $branch = Branch::where('branch_code', $branch_code)->first();
        $database_name = $branch->database_name;

        $imagePath = null;
        if ($request->hasFile('userImage')) {
            $image = $request->file('userImage');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Define dynamic folder path
            $folderPath = 'branch/patient_images/' . $database_name;

            // Check if folder exists, if not create it
            if (!Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->makeDirectory($folderPath);
            }

            // Store image in the dynamic folder
            $imagePath = $image->storeAs($folderPath, $imageName, 'public');
        }

        if (!$branch) {
            return response()->json(['error' => 'Branch not found Contact Your Management'], 404);
        }

        $this->DynamicDBService->setConnection($database_name, 'branch_temp');

        // Insert into dynamic DB
        DB::connection('branch_temp')->table('patient_registrations')->insert([
            'user_number' => $validated['userNumber'],
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'first_payment' => $validated['firstPayment'],
            'due_payment' => $validated['duePayment'],
            'date' => $validated['date'],
            'image' => $imagePath,
            'address' => $validated['address'],
            'patient_problem' => $validated['patintProblem'],
            'location' => $validated['location'],
            'status' => $validated['status'],
            'medication' => $validated['medication'],
            'medication_list' => $validated['medicineList'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->DynamicDBService->resetToDefault();


        return redirect()->back()->with('success', 'Patient registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
