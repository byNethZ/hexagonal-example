<?php
namespace Src\Example\User\Domain\ValueObject;

final class UserTimeStamp{
    private array $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function value(): array
    {
        return $this->value;
    }

    public function createdAt(): string
    {
        return $this->value['created_at'];
    }

    public function updatedAt(): string
    {
        return $this->value['updated_at'];
    }
}