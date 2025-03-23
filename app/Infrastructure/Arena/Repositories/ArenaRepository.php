<?php

namespace Myapp\Infrastructure\Arena\Repositories;

use Illuminate\Support\Facades\DB;
use Myapp\Application\Arena\DTo\ArenaDto;
use Myapp\Application\Arena\Mapper\ArenaMapper;
use Myapp\Application\Arena\Mapper\TimeSlotMapper;
use Myapp\Domain\Arena\Entities\Arena;
use Myapp\Domain\Arena\Model\ArenaEloquentModel;
use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;

final class ArenaRepository implements ArenaRepositoryInterface
{

    public function __construct(private ArenaEloquentModel $arenaEloquentModel) {}

    public function findAll(): array
    {
        $arenas = arenaEloquentModel::latest()->paginate(10);

        $transformedData = $arenas->getCollection()->map(function ($arena) {
            return ArenaMapper::fromEloquent($arena);
        });

        $arenas->setCollection($transformedData);

        return $arenas->toArray();
    }
    
    public function findById(int $id):Arena 
    {
        $arenaEloquent = $this->arenaEloquentModel::findOrFail($id);
        return ArenaMapper::fromEloquent($arenaEloquent);
    }

    public function store(Arena $arena): Arena
    {
        return DB::transaction(function () use ($arena) {
            $arenaEloquentModel = ArenaMapper::toEloquent($arena);
            $arenaEloquentModel->save();

            foreach ($arena->getTimeSlot() as $timeSlot) {
                $timeSlotEloquentModel = TimeSlotMapper::toEloquent($timeSlot);
                $timeSlotEloquentModel->arena_id =  $arenaEloquentModel->id;
                $timeSlotEloquentModel->save();
            }

            return ArenaMapper::fromEloquent($arenaEloquentModel);
        });
    }
    
    public function update(ArenaDto $arena,int $id):void
    {
        $arenaArray = $arena->toArray();
        $arenaEloquent = $this->arenaEloquentModel::query()->findOrFail($arena->id);
        $arenaEloquent->fill($arenaArray);
        $arenaEloquent->save();
    }

    public function delete(int $id): void
    {
        $arenaEloquent = $this->arenaEloquentModel::query()->findOrFail($id);
        $arenaEloquent->delete();
    }


}
