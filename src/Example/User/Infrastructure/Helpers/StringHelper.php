<?php

namespace Src\Example\User\Infrastructure\Helpers;

trait StringHelper
{
    public function toCamelCase(string $string): string
    {
        $string = preg_replace('/[^a-zA-Z0-9\x7f-\xff]++/i', ' ', $string);
        $string = trim($string);
        $string = ucwords($string);
        $string = str_replace(" ", "", $string);
        return lcfirst($string);
    }

    public function formatErrorRequest(array $errors): string
    {
        $message = "";
        foreach ($errors as $error) {
            $message .= $error . ". ";
        }
        return $message;
    }
}   