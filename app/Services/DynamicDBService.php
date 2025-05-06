<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class DynamicDBService
{
    public function setConnection($connectionName = 'branch_temp')
    {

        $authUser = Auth::user();
        $branchCode = $authUser->branch_code;

        // Get branch details
        $branch = Branch::where('branch_code', $branchCode)->first();
        $databaseName = $branch?->database_name;

        Config::set("database.connections.$connectionName", [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $databaseName,
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);

        DB::purge($connectionName);
        DB::setDefaultConnection($connectionName);
    }

    public function resetToDefault()
    {
        DB::setDefaultConnection(config('database.default'));
    }
}
