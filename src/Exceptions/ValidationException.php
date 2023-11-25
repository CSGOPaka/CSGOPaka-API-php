<?php

namespace CSGOPaka\Exceptions;

use Throwable;

class ValidationException extends CSGOPakaException
{
    public function __construct(private object $errors, ?Throwable $previous = null)
    {
        parent::__construct('Validation failed', 422, $previous);
    }

    public function getErrors(): object
    {
        return $this->errors;
    }
}