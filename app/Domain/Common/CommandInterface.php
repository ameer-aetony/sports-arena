<?php

namespace Myapp\Domain\Common;


interface CommandInterface
{
    /**
     * @throws UnauthorizedUserException
     */
    public function execute();
}