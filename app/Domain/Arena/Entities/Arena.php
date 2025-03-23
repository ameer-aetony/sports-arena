<?php

namespace Myapp\Domain\Arena\Entities;

use Myapp\Domain\Common\Entity;
use Myapp\Domain\ValueObjects\Description;
use Myapp\Domain\ValueObjects\Name;
use Myapp\Domain\ValueObjects\TimeSlots;

final class Arena extends Entity{

    public function __construct(
    public readonly ?int $id,
    public readonly Name $name,
    public readonly Description $description,
    public readonly TimeSlots $timeSlots,
    public readonly int $owner_id,
    )
    {
        
    }
    

    public function getTimeSlot()
    {
        return $this->timeSlots->getTimeSlot();
    }  
    
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->description,
            'timeSlots' => $this->timeSlots,
            'owner_id' => $this->owner_id,
        ];
    }
}