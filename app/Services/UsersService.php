<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AbstractRepository;
use App\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class UsersService
 * @package App\Services
 */
class UsersService extends AbstractEntityService
{

    /**
     * Users repository instance
     * @var UsersRepository
     */
    protected $repository;

    /**
     * UsersService constructor.
     * @param UsersRepository $repository
     */
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    protected function getRepository(): AbstractRepository
    {
        return $this->repository;
    }

    /**
     * Register new user
     *
     * @param array $data
     * @return User
     */
    public function register(array $data) : User
    {
        /**
         * @var User $user
         */
        $user = $this->repository->store(
            array_merge(
                $data,
                [
                    'password' => Hash::make($data['password'])
                ]
            )
        );

        return $user;
    }

    /**
     * Get token by email and password
     *
     * @param array $data
     * @return string|null
     */
    public function attempt(array $data) : ?string
    {
        return JWTAuth::attempt($data);
    }

    /**
     * Get auth token by model
     *
     * @param User $user
     * @return string
     */
    public function login(User $user) : string
    {
        return JWTAuth::fromUser($user);
    }
}
