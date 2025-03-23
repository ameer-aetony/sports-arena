<?php

namespace Myapp\Application\Arena\Mapper;

use Illuminate\Http\Request;
use Myapp\Application\Arena\DTo\TimeSlot;
use Myapp\Domain\Arena\Model\TimeSlotEloquentModel;
use Myapp\Domain\ValueObjects\SlotDuration;
use Myapp\Domain\ValueObjects\Time;
use Myapp\Domain\ValueObjects\TimeSlotStatus;

class TimeSlotMapper
{

    public static function fromRequest(Request $request): TimeSlot
    {
        return new TimeSlot(
            id: $request->input('id',null) ,
            slotDuration: new SlotDuration($request->string('slot_duration')),
            startTime: new Time($request->string('start_time')),
            endTime: new Time($request->string('end_time')),
            status: TimeSlotStatus::from($request->string('status')),
            arena_id:$request->input('arena_id'),
        );
    }

    public static function fromEloquent(TimeSlotEloquentModel $timeSlotEloquentModel):TimeSlot
    {
        return new TimeSlot(
            id: (int)$timeSlotEloquentModel->string('id'),
            slotDuration: new SlotDuration($timeSlotEloquentModel->string('slot_duration')),
            startTime: new Time($timeSlotEloquentModel->string('start_time')),
            endTime: new Time($timeSlotEloquentModel->string('end_time')),
            status: TimeSlotStatus::from($timeSlotEloquentModel->string('status')),
            arena_id: (int)$timeSlotEloquentModel->string('arena_id'),
        );
    }
   
    public static function fromArray(array $data): TimeSlot
    {
        return new TimeSlot(
            id: $data['id'] ,
            slotDuration: new SlotDuration($data['slot_duration']),
            startTime: new Time($data['start_time']),
            endTime: new Time($data['end_time']),
            status: TimeSlotStatus::from($data['status']),
            arena_id:$data['arena_id'],
        );
    }

    public static function toEloquent(TimeSlot $timeSlot): TimeSlotEloquentModel
    {
        $timeSlotEloquentModel = new TimeSlotEloquentModel();
        $timeSlotEloquentModel->slot_duration = $timeSlot->slotDuration;
        $timeSlotEloquentModel->start_time = $timeSlot->startTime;
        $timeSlotEloquentModel->end_time = $timeSlot->endTime;
        $timeSlotEloquentModel->status = $timeSlot->status;
        $timeSlotEloquentModel->arena_id = $timeSlot->arena_id;
        
        return $timeSlotEloquentModel;
    }
}
