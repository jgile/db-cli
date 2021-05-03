<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class ListCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'ls';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Alias for db snapshot:list';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('snapshot:list');
    }
}
