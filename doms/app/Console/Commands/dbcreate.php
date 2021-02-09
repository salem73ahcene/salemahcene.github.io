<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new mysql database based on config file or provided parametor';

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
        $schemaName= $this->argument('name') ?: config('database.connections.mysql.database');
      /*  $charset= config('database.connections.mysql.collation', 'utf8mb4');
        $collation= config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');*/

        config(['datadase.connections.mysql.database'=>null]);
       
        $query="DROP DATABASE $schemaName";
        DB::statement($query);


        $query= "CREATE DATABASE IF NOT EXISTS $schemaName ";
        
        DB::statement($query);
        
        echo "database created seccessfully!";

        config(['datadase.connections.mysql.database'=>$schemaName]);
    
    }
}
