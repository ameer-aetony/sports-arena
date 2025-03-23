<?php

namespace Myapp\Application\Arena\Mapper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Myapp\Application\Arena\Exceptions\RequiredTimeSlotException;
use Myapp\Domain\Arena\Entities\Arena;
use Myapp\Domain\Arena\Model\ArenaEloquentModel;
use Myapp\Domain\ValueObjects\Name;
use Myapp\Domain\ValueObjects\Description;
use Myapp\Domain\ValueObjects\TimeSlots;

class ArenaMapper
{

    public static function fromRequest(Request $request):Arena
    {
        $timeSlotsData = $request->input('time_slots', []);
        if (!$timeSlotsData) {
            throw new RequiredTimeSlotException();
        }

        $timeSlots = array_map(function ($timeSlotData) {
            return TimeSlotMapper::fromArray($timeSlotData);
        }, $timeSlotsData);
       
        return new Arena(
            id: (int)$request->input('id',null),
            name: new Name($request->string('name')),
            description: new Description($request->string('description')),
            timeSlots: new TimeSlots($timeSlots),
            owner_id: Auth::user()->id,
        );
    }

    public static function fromEloquent(ArenaEloquentModel $arenaEloquent,bool $with_time_slot=false): Arena
    {

        $timeSlots = array_map(function ($timeSlot) {
            return TimeSlotMapper::fromArray($timeSlot);
        },$arenaEloquent->timeSlots()->get()->toArray());
       
        return new Arena(
            id: (int)$arenaEloquent->id,
            name: new Name($arenaEloquent->name),
            description: new Description($arenaEloquent->description),
            timeSlots: new TimeSlots($timeSlots),
            owner_id: (int)$arenaEloquent->owner_id
        );

    }

    public static function toEloquent(Arena $arena): ArenaEloquentModel
    {
        $arenaEloquentModel = new ArenaEloquentModel();
        $arenaEloquentModel->name = $arena->name;
        $arenaEloquentModel->description = $arena->description;
        $arenaEloquentModel->owner_id = $arena->owner_id;
        return $arenaEloquentModel;
    }
}
