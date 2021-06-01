<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakePHPDoMakePHPDocumentation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:doc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates a file that your IDE understands, so it can provide accurate autocompletion. Generation is done based on the files in your project, so they are always up-to-date.';

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
        //phpDoc generation for Laravel Facades
        Artisan::call('ide-helper:generate');
        echo Artisan::output();

        //phpDocs for models
        Artisan::call('ide-helper:models --nowrite --dir="app/Models"');
        echo Artisan::output();

        //PhpStorm Meta file
        Artisan::call('ide-helper:meta');
        echo Artisan::output();

        return 0;
    }
}
