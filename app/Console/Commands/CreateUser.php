<?php

namespace App\Console\Commands;

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
    protected $signature = 'user:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create new user and store to BD';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Please enter user\'s name');
        $email = $this->ask('Please enter user\'s email');
        $password = $this->secret('Please enter user\'s password');
        $isAdmin = $this->confirm('Is the user an admin?', false);
        if (User::where('email', $email)->exists()) {
            $this->error('User with this email already exists');
            return;
        }
        $user = User::create([
            'admin' => $isAdmin ? 1: 0,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->info("User $name has been create and registered successfully with email $email");
    }

}
