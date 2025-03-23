<?php

namespace Myapp\Domain\ValueObjects;

use Myapp\Application\Myapp\DTO\TimeSlot;
use Myapp\Domain\Common\ValueObject;

final class TimeSlots extends ValueObject
{
    public readonly array $timeSlots;

    public function __construct(array $timeSlots)
    {
    

        foreach ($timeSlots as $timeSlot) {
            if (!$timeSlot instanceof TimeSlot) {
                throw new \InvalidArgumentException('Invalid timeSlot');
            }
        }
        $this->timeSlots = $timeSlots;
    }

    
    public function getTimeSlot()
    {
        return $this->timeSlots;
    }
    
    public function toArray(): array
    {
       return $this->timeSlots;
    }

    public function jsonSerialize(): array
    {
        return $this->timeSlots;
    }
}