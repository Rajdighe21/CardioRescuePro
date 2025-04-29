<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Services\DynamicDBService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class DoctorController extends Controller
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
            $doctors = DB::table('doctors')->get();
        } catch (\Exception $e) {
            DB::setDefaultConnection(env('DB_CONNECTION', 'mysql'));
            $doctors = DB::table('doctors')->where('role', 'doctor')->get();
        }
        return view('doctor.index', compact('doctors'));
    }

    public function create()
    {
        $userId = User::orderBy('id', 'desc')->pluck('id')->first() + 1;
        $branchPrifix = Auth::user()->branch_code;
        $prefix = substr($branchPrifix, 0, 2) . date('Y') . $userId;
        return view('doctor.create', compact('prefix'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required',
            'emg_contact' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'user_number' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // STORE IN MAIN DB
        $StoreUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'branch_code' => $request->user_number,
            'role' => 'doctor',
            'password' => Hash::make($request->contact),
        ]);


        // STORE IN CHILD DB
        $branch_code = Auth::user()->branch_code;
        $branch = Branch::where('branch_code', $branch_code)->first();
        $database_name = $branch->database_name;

        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folderPath = 'branch/' . $database_name . '/doctor_images';
            if (!Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->makeDirectory($folderPath);
            }
            $imagePath = $image->storeAs($folderPath, $imageName, 'public');
        }

        $additionalDocumentsPaths = [];
        if ($request->hasFile('additional_documents')) {
            foreach ($request->file('additional_documents') as $document) {
                $docName = time() . '_' . $document->getClientOriginalName();
                $docFolder = 'branch/' . $database_name . '/doctor_documents';
                if (!Storage::disk('public')->exists($docFolder)) {
                    Storage::disk('public')->makeDirectory($docFolder);
                }
                $path = $document->storeAs($docFolder, $docName, 'public');
                $additionalDocumentsPaths[] = $path;
            }
        }

        if (!$branch) {
            return response()->json(['error' => 'Branch not found Contact Your Management'], 404);
        }

        $this->DynamicDBService->setConnection($database_name, 'branch_temp');

        DB::connection('branch_temp')->table('doctors')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact' => $validated['contact'],
            'emg_contact' => $validated['emg_contact'],
            'user_number' => $validated['user_number'],
            'salary' => $validated['salary'],
            'address' => $validated['address'],
            'profile_image' => $imagePath,
            'additional_documents' => json_encode($additionalDocumentsPaths),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->DynamicDBService->resetToDefault();

        return redirect()->back()->with('success', 'Doctor Added Successfully');
    }
}
