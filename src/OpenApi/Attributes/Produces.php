<?php

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Produces
{
    /**
     * @param string[] $contentTypes The content types that can be produced.
     */
    public function __construct(
        public array $contentTypes = []
    ) {
    }
}
