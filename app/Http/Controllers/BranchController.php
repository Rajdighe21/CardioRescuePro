<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\BranchDatabaseService;
use App\Services\DynamicDBService;

class BranchController extends Controller
{
    protected $branchDatabaseService;
    protected $dynamicDb;

    public function __construct(BranchDatabaseService $branchDatabaseService, DynamicDBService $dynamicDb)
    {
        $this->branchDatabaseService = $branchDatabaseService;
        $this->dynamicDb = $dynamicDb;
    }

    public function index()
    {
        $branch_id = optional(Branch::latest('id')->first())->id ? Branch::latest('id')->first()->id + 1 : 1;
        $branches = Branch::with('admin:id,name,contact')->orderBy('id', 'DESC')->paginate(5);
        return view('branch.branches', compact('branch_id', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'email' => 'required|email|unique:branches,email',
            'branch_prefix' => ['required', 'regex:/^[A-Z]+$/'],
            'branch_code' => 'required|string',
            'admin_name' => 'required|string|max:255',
            'contact' => 'required|numeric',
            'branch_logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'address' => 'required'
        ]);

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email already taken, please use another.');
        }

        // CREATE ADMIN USER
        $user = User::create([
            'name' => $request->admin_name,
            'email' => $request->email,
            'role' => 'admin',
            'contact' => $request->contact,
            'branch_code' => $request->branch_prefix . $request->branch_code,
            'password' => Hash::make($request->contact),
        ]);

        // Handle file upload
        $branchLogoPath = null;
        if ($request->hasFile('branch_logo')) {
            $file = $request->file('branch_logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('branch/logo'), $fileName);
            $branchLogoPath = 'branch/logo/' . $fileName;
        }

        $firstWord = explode(' ', trim($request->name))[0];
        $databaseName = 'branch_rd_' . strtolower($firstWord);
        $this->branchDatabaseService->createDatabase($databaseName);

        Branch::create([
            'branch_name' => $request->name,
            'location' => $request->location,
            'email' => $request->email,
            'branch_code' => $request->branch_prefix . $request->branch_code,
            'database_name' => $databaseName,
            'admin_id' => $user->id,
            'image' => $branchLogoPath,
            'date' => $request->date,
            'address' => $request->address,
        ]);


        $this->dynamicDb->setConnection($databaseName);


        DB::connection('branch_temp')->table('users')->insert([
            'id' => $user->id,
            'name' => $request->admin_name,
            'email' => $request->email,
            'role' => 'admin',
            'contact' => $request->contact,
            'password' => Hash::make($request->contact),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->dynamicDb->resetToDefault();


        return redirect()->back()->with('success', 'Branch Created successfully');
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
