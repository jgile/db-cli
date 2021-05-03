<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class Info extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'info';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Show db info';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->table(['name', 'value'], [
            ['Snapshots Directory', config("filesystems.disks.snapshots.root")]
        ]);
    }
}
