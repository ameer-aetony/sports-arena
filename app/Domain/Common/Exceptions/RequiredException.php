<?php

namespace Myapp\Domain\Common\Exceptions;

final class RequiredException extends \DomainException
{
    public function __construct($fieldName)
    {
        parent::__construct(trans('validation.required', ['attribute' => $fieldName]));
    }
}