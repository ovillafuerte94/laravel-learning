<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

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
        $name = $this->ask('Enter name');
        $email = $this->ask('Enter e-mail');
        $password = $this->ask('Enter password');

        $rol = $this->choice('Choose rol', Role::pluck('name', 'id')->toArray());

        $user = User::create([
            'name'          => $name,
            'email'         => $email,
            'password'      => Hash::make($password)
        ]);

        $user->assignRole($rol);

        $this->info('User ' . $name . ' was created.');
    }
}
