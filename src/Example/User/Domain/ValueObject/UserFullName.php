<?php
namespace Src\Example\User\Domain\ValueObject;

final class UserFullName{
    private array $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function value(): array
    {
        return $this->value;
    }

    public function firstName(): string
    {
        return $this->value['first_name'];
    }

    public function lastName(): string
    {
        return $this->value['last_name'];
    }

    public function fullName(): string
    {
        return $this->value['first_name'] . ' ' . $this->value['last_name'];
    }
}