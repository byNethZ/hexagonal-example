<?php

namespace Src\Example\User\Domain\Contracts;

use Src\Example\User\Domain\ValueObject\UserId;
use Src\Example\User\Domain\ValueObject\UserSaveRequest;
use Src\Example\User\Infrastructure\Repositories\Eloquent\User;

interface UserRepositoryContract
{
    public function findAll(): array;
    public function find(UserId $id): User | null;
    public function save(UserSaveRequest $user): User;
    public function delete(UserId $id): int | null;
}