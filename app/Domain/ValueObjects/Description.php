<?php

namespace Myapp\Domain\ValueObjects;

use Myapp\Domain\Common\Exceptions\RequiredException;
use Myapp\Domain\Common\ValueObject;

final class Description extends ValueObject
{
    public function __construct(private String $description)
    {
        if(!$description)
        {
            throw new RequiredException('name');
        }

    }

    public function __toString(): string
    {
        return $this->description;
    }

    public function jsonSerialize(): string
    {
        return $this->description;
    }
}