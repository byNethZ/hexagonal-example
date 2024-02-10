<?php

namespace Src\Example\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Example\User\Application\Delete\UserDeleteByIdUseCase;

class UserDeleteByIdController
{
    private $deleteByIdUseCase;
    
    public function __construct(UserDeleteByIdUseCase $deleteByIdUseCase)
    {
        $this->deleteByIdUseCase = $deleteByIdUseCase;
    }

    public function __invoke($id): object
    {
        return response()->json($this->deleteByIdUseCase->__invoke($id));
    }
}
