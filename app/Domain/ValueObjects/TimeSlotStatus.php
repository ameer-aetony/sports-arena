<?php

namespace Myapp\Domain\ValueObjects;

enum TimeSlotStatus: string
{
    case AVAILABLE = 'available';
    case PENDING = 'pending';
    case BOOKED = 'booked';
}
