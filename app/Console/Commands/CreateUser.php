<?php

namespace App\Console\Commands;

use App\Services\UsersService;
use Illuminate\Console\Command;

/**
 * Class CreateUser
 * @package App\Console\Commands
 */
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Users service instance
     * @var UsersService
     */
    protected $users_service;

    /**
     * Create a new command instance.
     *
     * @param UsersService $users_service
     */
    public function __construct(UsersService $users_service)
    {
        parent::__construct();

        $this->users_service = $users_service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask('Please, enter email:');
        $password = $this->secret('Please, enter password:');

        $this->users_service->register([
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('User successfully created!');
    }
}
