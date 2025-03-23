<?php

namespace Myapp\Application\Arena\UseCases\Command;

use Myapp\Domain\Arena\Entities\Arena;
use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;
use Myapp\Domain\Common\CommandInterface;

class StoreArenaCommand implements CommandInterface
{
    private ArenaRepositoryInterface $repository;

    public function __construct(
        private readonly Arena $arena
    )
    {
        $this->repository = app()->make(ArenaRepositoryInterface::class);
    }

    public function execute(): Arena
    {

        return $this->repository->store($this->arena);
    }
}