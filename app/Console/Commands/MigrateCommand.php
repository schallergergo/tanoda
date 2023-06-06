<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fresh --seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database refresh';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return response()->json(["ok"],200);
    }
}
