<?php

namespace Src\Example\User\Application\Save;

use Src\Example\User\Domain\Contracts\UserRepositoryContract;
use Src\Example\User\Domain\Exceptions\UserException;
use Src\Example\User\Domain\ValueObject\UserSaveRequest;
use Src\Example\User\Infrastructure\Repositories\Eloquent\User;

class UserSaveUseCase
{
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(array $request): User
    {
        $response = $this->userRepository->save(new UserSaveRequest($request));
        if(!$response) {
            $this->exception();
        }

        return $response;
    }

    private function exception()
    {
        throw new UserException("User not created", 400);
    }
}
