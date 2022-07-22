<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DataBaseImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:import {file=backup-blogs.sql} {--fullpath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import file to database';

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
     * @return int
     */
    public function handle()
    {
        $filename=$this->argument('file');
        // $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/app/backup/" . $filename;
        $command = "mysql --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD'). " " . env('DB_DATABASE') . "  < " . storage_path() . "/app/backup/" . $filename;
        
        $returnVar = NULL;
        $output = NULL;


        exec($command, $output, $returnVar);
    }
}
