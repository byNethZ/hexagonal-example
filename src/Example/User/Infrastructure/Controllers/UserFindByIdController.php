<?php

namespace Src\Example\User\Infrastructure\Controllers;

use Src\Example\User\Application\Find\UserFindByIdUseCase;

class UserFindByIdController
{
    private $findByIdUseCase;
    
    public function __construct(UserFindByIdUseCase $findByIdUseCase)
    {
        $this->findByIdUseCase = $findByIdUseCase;
    }

    public function __invoke($id): object
    {
        return response()->json($this->findByIdUseCase->__invoke($id));
    }
}
