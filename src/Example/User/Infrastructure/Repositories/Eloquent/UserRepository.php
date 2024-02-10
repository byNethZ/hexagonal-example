<?php

namespace Src\Example\User\Infrastructure\Repositories\Eloquent;

use Src\Example\User\Domain\Contracts\UserRepositoryContract;
use Src\Example\User\Domain\ValueObject\UserId;
use Src\Example\User\Domain\ValueObject\UserSaveRequest;

final class UserRepository implements UserRepositoryContract
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function findAll(): array
    {
        return $this->model->all()->toArray();
    }

    public function find(UserId $id): User | null
    {
        return $this->model->find($id->value());
    }
    
    public function delete(UserId $id): int | null
    {
        return $this->model->destroy($id->value());
    }

    public function save(UserSaveRequest $user): User
    {
        $userSaved = new User();
        $userSaved->username = $user->username();
        $userSaved->last_name = $user->lastName();
        $userSaved->first_name = $user->firstName();
        $userSaved->email = $user->email();
        $userSaved->password = $user->password();
        $userSaved->save();

        return $userSaved;
    }
}