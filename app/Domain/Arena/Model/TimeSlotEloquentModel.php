<?php

namespace Myapp\Domain\Arena\Model;

use Illuminate\Database\Eloquent\Model;
use Myapp\Domain\Booking\Model\BookingEloquentModel;

class TimeSlotEloquentModel extends Model
{
    protected $table = 'time_slots';
    protected $fillable = ['arena_id', 'start_time', 'end_time', 'status'];

    public function arena()
    {
        return $this->belongsTo(ArenaEloquentModel::class,'arena_id');
    }

    public function bookings()
    {
        return $this->hasMany(BookingEloquentModel::class,'time_slot_id');
    }
}
