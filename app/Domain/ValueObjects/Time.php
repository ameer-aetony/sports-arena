<?php

namespace Myapp\Domain\ValueObjects;


use InvalidArgumentException;
use Myapp\Domain\Common\ValueObject;

final class Time  extends ValueObject
{
    private string $time;

    public function __construct(string $time)
    {
       
        if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', $time)) {
            throw new InvalidArgumentException('Invalid time format. Expected format: H:i or H:i:s');
        }
  
        $this->time = $time;
    }

    public function getValue(): string
    {
        return $this->time;
    }

    public function __toString(): string
    {
        return $this->time;
    }

    public function jsonSerialize(): string
    {
        return $this->time;
    }
}
