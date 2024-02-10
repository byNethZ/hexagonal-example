<?php
namespace Src\Example\User\Domain\ValueObject;

final class UserSaveRequest{
    private array $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function value(): array
    {
        return $this->value;
    }

    public function username(): string
    {
        return $this->value['username'];
    }

    public function lastName(): string
    {
        return $this->value['last_name'];
    }

    public function firstName(): string
    {
        return $this->value['first_name'];
    }

    public function email(): string
    {
        return $this->value['email'];
    }

    public function password(): string
    {
        return password_hash($this->value['password'], PASSWORD_DEFAULT);
    }
}