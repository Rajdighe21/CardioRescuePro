<?php

namespace App\Console\Commands;

use App\Models\Branch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class MigrateAllBranches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:migrate-all-branches';

    protected $signature = 'migrate:branches';
    protected $description = 'Run migrations for all branch databases stored in the branches table';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $branches = Branch::all();

        foreach ($branches as $branch) {
            $databaseName = $branch->database_name;

            // Define the connection at runtime
            Config::set("database.connections.branch_dynamic", [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => $databaseName,

                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ]);

            // Confirm the connection works
            DB::purge('branch_dynamic');
            DB::reconnect('branch_dynamic');

            $this->info("Migrating for branch DB: $databaseName");

            // Run migrations on this database
            Artisan::call('migrate', [
                '--database' => 'branch_dynamic',
                '--path' => '/database/migrations/branch',
                '--force' => true,
            ]);

            $this->info(Artisan::output());
        }
    }
}
