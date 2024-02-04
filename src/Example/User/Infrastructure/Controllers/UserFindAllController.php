<?php

namespace Src\Example\User\Infrastructure\Controllers;

use Src\Example\User\Application\Find\UserFindAllUseCase;

class UserFindAllController
{
    private $findAllUseCase;
    
    public function __construct(UserFindAllUseCase $findAllUseCase)
    {
        $this->findAllUseCase = $findAllUseCase;
    }

    public function __invoke(): object
    {
        return response()->json($this->findAllUseCase->__invoke());
    }
}
