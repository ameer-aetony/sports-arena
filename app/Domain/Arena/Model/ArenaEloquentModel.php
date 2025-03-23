<?php

namespace Myapp\Domain\Arena\Model;

use Illuminate\Database\Eloquent\Model;

class ArenaEloquentModel extends Model
{
    protected $table = 'arenas';
    protected $fillable = ['name', 'description', 'owner_id'];

    public function owner()
    {
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlotEloquentModel::class,'arena_id');
    }
}
