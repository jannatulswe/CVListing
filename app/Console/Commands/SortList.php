<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SortList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sort:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sort The List Of Value!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {



    }
}
