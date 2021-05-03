<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class Dump extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dump {name?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Alias for db snapshot:create --compress';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $params = ['--compress' => true];

        if ($this->argument('name')) {
            $params['name'] = $this->argument('name');
        }

        $this->call('snapshot:create', $params);
    }
}
