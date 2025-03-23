<?php

namespace Myapp\Application\Arena\DTo;

use Illuminate\Http\Request;
use Myapp\Domain\Arena\Model\TimeSlotEloquentModel;
use Myapp\Domain\ValueObjects\SlotDuration;
use Myapp\Domain\ValueObjects\Time;
use Myapp\Domain\ValueObjects\TimeSlotStatus;

class TimeSlot
{
    public function __construct(
        public readonly ?int $id,
        public readonly SlotDuration $slotDuration,
        public readonly Time $startTime,
        public readonly Time $endTime,
        public readonly TimeSlotStatus $status,
        public readonly int $arena_id,
    )
    {}

    public static function fromRequest(Request $request):self 
    {
        return new self(
            id: $request->input('id',null),
            slotDuration: new SlotDuration($request->string('slot_duration')),
            startTime: new Time($request->string('start_time')),
            endTime: new Time($request->string('end_time')),
            status:  TimeSlotStatus::from($request->status),
            arena_id:  $request->input('arena_id'),
        );
    }

    public static function fromEloquent(TimeSlotEloquentModel $timeSlotEloquent): self
    {
        return new self(
            id: $timeSlotEloquent->id,
            slotDuration: $timeSlotEloquent->slot_duration,
            startTime: $timeSlotEloquent->start_time,
            endTime: $timeSlotEloquent->end_time,
            status: TimeSlotStatus::from($timeSlotEloquent->status),
            arena_id: $timeSlotEloquent->arena_id,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'slot_duration' => $this->slotDuration,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'status' => $this->status,
            'arena_id' => $this->arena_id,
        ];
    }
}