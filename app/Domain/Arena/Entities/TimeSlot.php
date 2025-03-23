<?php

namespace Myapp\Domain\Arena\Entities;

use Myapp\Domain\Common\Entity;
use Myapp\Domain\ValueObjects\SlotDuration;
use Myapp\Domain\ValueObjects\Time;
use Myapp\Domain\ValueObjects\TimeSlotStatus;

final class TimeSlot extends Entity{

    public function __construct(
        public readonly ?int $id,
        public readonly SlotDuration $slotDuration,
        public readonly Time $startTime,
        public readonly Time $endTime,
        public readonly TimeSlotStatus $status,
        public readonly int $arena_id,
    )
    {
        
    }

    public function toArray():array
    {
        return [
            'id' => $this->id,
            'name' => $this->slotDuration,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'status' => $this->status,
        ];
    }
}