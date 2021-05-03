<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class Create extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create {name?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $factory = app('db.factory');
        $config = config('database.connections.' . config('database.default'));
        $name = $this->argument('name') ?: $config['database'];
        $config['database'] = null;
        $connection = $factory->make($config);

        if ($connection->statement("CREATE DATABASE IF NOT EXISTS $name")) {
            $this->info("Created database $name");
        }
    }
}
