<?php

namespace OpenApi;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Consumes
{
    /**
     * @param string[] $contentTypes The content types that can be consumed.
     */
    public function __construct(
        public array $contentTypes = []
    ) {
    }
}
