<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DynamicDBService
{
    public function setConnection($databaseName, $connectionName = 'branch_temp')
    {
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
