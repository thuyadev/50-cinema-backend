<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class CustomException extends Exception
{
    public function __construct(string $message = "SERVER ERROR", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
