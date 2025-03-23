<?php

namespace Myapp\Application\Arena\UseCases\Command;

use Myapp\Application\Arena\DTo\ArenaDto;
use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;
use Myapp\Domain\Common\CommandInterface;

class UpdateArenaCommand implements CommandInterface
{
    private ArenaRepositoryInterface $repository;

    public function __construct(
        private readonly ArenaDto $arena,
        private readonly int $arena_id
    )
    {
        $this->repository = app()->make(ArenaRepositoryInterface::class);
    }

    public function execute()
    {

        return $this->repository->update($this->arena,$this->arena_id);
    }
}