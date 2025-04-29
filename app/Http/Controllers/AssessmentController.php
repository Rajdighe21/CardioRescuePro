<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Services\DynamicDBService;
use Illuminate\Support\Facades\DB;
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


        return view('assessment.assign',compact('users'));
    }
}
