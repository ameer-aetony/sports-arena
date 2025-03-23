<?php

namespace Myapp\Application\Arena\UseCases\Queries;

use Myapp\Domain\Arena\Repositories\ArenaRepositoryInterface;
use Myapp\Domain\Common\QueryInterface;

class FindAllArenasQuery implements QueryInterface
{
    private ArenaRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = app()->make(ArenaRepositoryInterface::class);
    }

    public function handle(): array
    {
       
        return $this->repository->findAll();
    }
}