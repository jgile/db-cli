<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class Open extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'open';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Open in TablePlus';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $driver = config('database.default');
        $database = config("database.connections.$driver.database");
        $username = config("database.connections.$driver.username");
        $password = config("database.connections.$driver.password");
        $host = config("database.connections.$driver.host");
        $port = config("database.connections.$driver.port");
        $driver = $driver === 'pgsql' ? 'postgresql' : $driver;

        $open = "$driver://$username";
        $open = $password ? $open . ":$password" : $open;
        $open = $host ? $open . "@$host" : $open;
        $open = $host && $port ? $open . ":$port" : $open;
        $open = $database ? $open . "/$database" : $open;

        $this->info($open);

        exec("open \"$open\"");
    }
}
