<?php

namespace Src\Example\User\Domain\Exceptions;

use Src\Example\Shared\Domain\Exceptions\CustomException;

final class UserException extends CustomException
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}