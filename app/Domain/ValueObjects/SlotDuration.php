<?php

namespace Myapp\Domain\ValueObjects;
use Myapp\Domain\Common\Exceptions\RequiredException;
use Myapp\Domain\Common\ValueObject;

final class SlotDuration extends ValueObject
{
    public function __construct(private String $SlotDuration)
    {
        if(!$SlotDuration)
        {
            throw new RequiredException('slot_duration');
        }
    }

    public function __toString(): string
    {
        return $this->SlotDuration;
    }

    public function jsonSerialize(): string
    {
        return $this->SlotDuration;
    }
}