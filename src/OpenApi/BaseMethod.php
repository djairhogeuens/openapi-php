<?php

namespace OpenApi\Attributes;

abstract class BaseMethod
{
    public function __construct(
        public string $path = ""
    ) {
    }
}
