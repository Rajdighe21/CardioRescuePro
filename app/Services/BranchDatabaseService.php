<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class BranchDatabaseService
{
    public function createDatabase($databaseName)
    {

        // Check if the database exists
        $dbExists = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$databaseName]);

        if (empty($dbExists)) {
            DB::statement("CREATE DATABASE `$databaseName`");

            // Update database config dynamically
            config(['database.connections.dynamic' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => $databaseName,
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
            ]]);

            // Run migrations for the new database
            Artisan::call('migrate', [
                '--database' => 'dynamic',
                '--path' => 'database/migrations/branch', // Adjust path if needed
            ]);
        }

        return $databaseName;
    }
}
