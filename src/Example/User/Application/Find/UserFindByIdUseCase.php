<?php

namespace Src\Example\User\Application\Find;

use Src\Example\User\Domain\Contracts\UserRepositoryContract;
use Src\Example\User\Domain\Exceptions\UserException;
use Src\Example\User\Domain\ValueObject\UserId;
use Src\Example\User\Infrastructure\Repositories\Eloquent\User;

class UserFindByIdUseCase
{
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(int $id): User
    {
        $user = $this->userRepository->find(new UserId($id));

        if(!$user) {
            $this->exception();
        }

        return $user;
    }

    private function exception()
    {
        throw new UserException("User not found", 404);
    }
}
