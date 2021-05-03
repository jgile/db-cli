<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class Restore extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'restore {name?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Alias for db snapshot:load --latest';

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws BindingResolutionException
     */
    public function handle()
    {
        $config = config('database.connections.' . config('database.default'));

        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::connection()->statement("DROP SCHEMA " . $config['schema'] . " CASCADE;");
            DB::connection()->statement("CREATE SCHEMA " . $config['schema']);
        }

        if ($this->argument('name')) {
            $args = ['name' => $this->argument('name')];
        } else {
            $args = ['--latest' => true];
        }

        $this->call('snapshot:load', $args);
    }
}
