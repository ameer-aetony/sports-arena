<?php

namespace Myapp\Application\Arena\UseCases\Command;

use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;
use Myapp\Domain\Common\CommandInterface;

class DestroyCompanyCommand implements CommandInterface
{
    private ArenaRepositoryInterface $repository;

    public function __construct(
   
        private readonly int $arena_id
    )
    {
        $this->repository = app()->make(ArenaRepositoryInterface::class);
    }

    public function execute()
    {

        $this->repository->delete($this->arena_id);   
    }
}