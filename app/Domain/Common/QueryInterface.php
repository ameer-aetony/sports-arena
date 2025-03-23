<?php

namespace Myapp\Domain\Common;


interface QueryInterface
{
   
    public function handle(): mixed;
}