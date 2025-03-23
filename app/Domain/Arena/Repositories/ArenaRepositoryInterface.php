<?php

namespace Myapp\Domain\Arena\Repositories;

use Myapp\Application\Arena\DTo\ArenaDto;
use Myapp\Domain\Arena\Entities\Arena;

interface ArenaRepositoryInterface{

    public function findAll():array;

    public function findById(int $id): Arena;

    public function store(Arena $arena): Arena;

    public function update(ArenaDto $arena,int $id): void;

    public function delete(int $id): void;
}