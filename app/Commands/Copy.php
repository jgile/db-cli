<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class Copy extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'copy {name}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Copy a database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('dump');
        $this->call('create', ['name' => $this->argument('name')]);
        config(['database.connections.' . config('database.default') . '.database' => $this->argument('name')]);
        $this->call('restore');
    }
}
