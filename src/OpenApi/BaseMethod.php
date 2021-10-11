<?php

namespace OpenApi;

abstract class BaseMethod
{
    public function __construct(
        public string $path = ""
    ) {
    }
}
