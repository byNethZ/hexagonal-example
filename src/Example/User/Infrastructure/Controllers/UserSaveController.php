<?php

namespace Src\Example\User\Infrastructure\Controllers;

use Src\Example\User\Application\Save\UserSaveUseCase;
use Src\Example\User\Infrastructure\Request\UserSaveRequest;

final class UserSaveController{
    private $userSaveUseCase;
    public function __construct(UserSaveUseCase $userSaveUseCase)
    {
        $this->userSaveUseCase = $userSaveUseCase;
    }

    public function __invoke(UserSaveRequest $request)
    {
        return $this->userSaveUseCase->__invoke($request->all());
    }
}