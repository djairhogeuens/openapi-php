<?php

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Path
{
    public function __construct(
        public string $path
    ) {
    }
}
