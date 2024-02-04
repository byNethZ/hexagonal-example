<?php

namespace Src\Example\User\Application\Find;

class UserFindAllUseCase
{

    public function __construct()
    {
    }

    public function __invoke(): array
    {
        return [
            'users' => [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com'
                ]
            ]
        ];
    }
}
