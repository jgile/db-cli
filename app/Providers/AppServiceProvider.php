<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelZero\Framework\Exceptions\ConsoleException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $connection = config('database.default');
        $dbname = config("database.connections.$connection.database");
        $root = $_SERVER['HOME'] . "/Snapshots/$connection/$dbname";

        config(["filesystems.disks.snapshots.root" => $root]);
    }


    /**
     * Register any application services.
     *
     * @return void
     * @throws ConsoleException
     */
    public function register()
    {
        if (blank(config('database.default'))) {
            throw new ConsoleException(".env not found");
        }
    }
}
