<?php

namespace Myapp\Domain\Common\Exceptions;

final class UnauthorizedUserException extends \Exception
{
    public function __construct(string $custom_message = '')
    {
        parent::__construct($custom_message ?: 'The user is not authorized');
    }
}