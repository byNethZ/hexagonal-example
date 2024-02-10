<?php

namespace Src\Example\User\Application\Delete;

use Src\Example\User\Domain\Contracts\UserRepositoryContract;
use Src\Example\User\Domain\Exceptions\UserException;
use Src\Example\User\Domain\ValueObject\UserId;

class UserDeleteByIdUseCase
{
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(int $id): int
    {
        $response = $this->userRepository->delete(new UserId($id));

        if(!$response) {
            $this->exception();
        }

        return $response;
    }

    private function exception()
    {
        throw new UserException("User not found", 404);
    }
}
