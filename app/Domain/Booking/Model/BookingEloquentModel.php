<?php

namespace Myapp\Domain\Booking\Model;

use Illuminate\Database\Eloquent\Model;
use Myapp\Domain\Arena\Model\TimeSlotEloquentModel;

class BookingEloquentModel extends Model

{
    protected $table = 'bookings';
    protected $fillable = ['time_slot_id', 'customer_id', 'status', 'expires_at'];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlotEloquentModel::class, 'time_slot_id');
    }
}
