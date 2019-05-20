<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add admin to DataBase';

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
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        $this->info('List admins:');
        $this->table(['id', 'name', 'email'], User::select(['id', 'name', 'email'])->get());
    }
}
