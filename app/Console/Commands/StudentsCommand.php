<?php

namespace App\Console\Commands;

use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class StudentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add students to DataBase';

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
        $students = Config::get('students');
        foreach ($students as $student){
            Student::create(['name' => $student]);
        }
        $this->info('Added ' . count($students) . ' students');
        $this->info('List students: ');
        $students = Student::select(['id', 'name'])->get();
        $this->table(['id', 'name'],$students);
    }
}
