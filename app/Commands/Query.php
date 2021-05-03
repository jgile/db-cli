<?php

namespace App\Commands;

use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class Query extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'query {query} {--r|ray}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Query the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = DB::select($this->argument('query'));

        if ($this->option('ray')) {
            ray($response);
        } else {
            dd($response);
        }
    }
}
