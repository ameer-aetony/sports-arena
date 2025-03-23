<?php

namespace Myapp\Application\Arena\UseCases\Queries;

use Myapp\Domain\Arena\Entities\Arena;
use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;
use Myapp\Domain\Common\QueryInterface;

class FindArenaByIdQuery implements QueryInterface
{
    private ArenaRepositoryInterface $repository;

    public function __construct(private readonly int $id)
    {
        $this->repository = app()->make(ArenaRepositoryInterface::class);
    }

    public function handle(): Arena
    {
        return $this->repository->findById($this->id);
    }
}
