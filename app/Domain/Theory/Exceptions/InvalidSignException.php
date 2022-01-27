<?php

namespace App\Domain\Theory\Exceptions;

use Exception;

class InvalidSignException extends Exception
{
    protected $message = 'The given sign was invalid';
}
