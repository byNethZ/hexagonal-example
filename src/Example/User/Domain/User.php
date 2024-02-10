<?php

namespace Src\Example\User\Domain;

use Src\Example\User\Domain\ValueObject\{
    UserTimeStamp,
    UserEmail,
    UserPassword,
    UserUserName,
    UserFullName,
};

final class User {
    private UserUserName $userUserName;
    private UserEmail $userEmail;
    private UserPassword $userPassword;
    private UserTimeStamp $userTimeStamp;    
    private UserFullName $userFullName;

    public function __construct(
        UserUserName $userUserName,
        UserEmail $userEmail,
        UserPassword $userPassword,
        UserTimeStamp $userTimeStamp,
        UserFullName $userFullName
    )
    {
        $this->userUserName = $userUserName;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->userTimeStamp = $userTimeStamp;
        $this->userFullName = $userFullName;
    }

    public function userUserName(): UserUserName
    {
        return $this->userUserName;
    }

    public function userEmail(): UserEmail
    {
        return $this->userEmail;
    }

    public function userPassword(): UserPassword
    {
        return $this->userPassword;
    }

    public function userTimeStamp(): UserTimeStamp
    {
        return $this->userTimeStamp;
    }

    public function userFullName(): UserFullName
    {
        return $this->userFullName;
    }

}