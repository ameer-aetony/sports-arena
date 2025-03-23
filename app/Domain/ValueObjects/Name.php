<?php

namespace Myapp\Domain\ValueObjects;
use Myapp\Domain\Common\Exceptions\RequiredException;
use Myapp\Domain\Common\ValueObject;

final class Name extends ValueObject
{
    public function __construct(private String $name)
    {
        if(!$name)
        {
            throw new RequiredException('name');
        }

        if (strlen($name) > 255) {
            throw new \InvalidArgumentException('name cannot exceed 255 characters.');
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }
}