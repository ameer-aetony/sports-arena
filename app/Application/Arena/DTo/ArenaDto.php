<?php

namespace Myapp\Application\Arena\DTo;

use Illuminate\Http\Request;
use Myapp\Domain\Arena\Model\ArenaEloquentModel;
use Myapp\Domain\ValueObjects\Description;
use Myapp\Domain\ValueObjects\Name;
use Myapp\Domain\ValueObjects\TimeSlots;

class ArenaDto
{
    public function __construct(
        public readonly ?int $id,
        public readonly Name $name,
        public readonly Description $description,
        public readonly TimeSlots $timeSlots,
        public readonly int $owner_id,
    )
    {}

    public static function fromRequest(Request $request):self 
    {
        return new self(
            id: $request->input('id',null) ,
            name: new Name($request->string('fiscal_name')),
            description: new Description($request->string('description')),
            timeSlots: new TimeSlots($request->input('time_slots',[])),
            owner_id: $request->input('owner_id',null),
        );
    }

    public static function fromEloquent(ArenaEloquentModel $arenaEloquent): self
    {
        return new self(
            id: $arenaEloquent->id,
            name: new Name($arenaEloquent->name),
            description: new Description($arenaEloquent->description),
            timeSlots: new TimeSlots($arenaEloquent->timeSlots),
            owner_id: $arenaEloquent->owner_id,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'timeSlots' => $this->timeSlots,
            'owner_id' => $this->owner_id,
        ];
    }
}