<?php

namespace Myapp\Application\Arena\Exceptions;

class RequiredTimeSlotException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Time slots is required');
    }
}