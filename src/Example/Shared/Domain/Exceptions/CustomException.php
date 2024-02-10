<?php

namespace Src\Example\Shared\Domain\Exceptions;

use ReflectionClass;

class CustomException extends \Exception
{
    public function toException(): array
    {
        $classTemporally = new ReflectionClass(get_class($this));
        $class = explode('\\', $classTemporally->getName());

        return [
            'code' => $this->getCode(),
            'error' => true,
            'class' => end($class),
            'message' => $this->getMessage(),
        ];
    }
}
