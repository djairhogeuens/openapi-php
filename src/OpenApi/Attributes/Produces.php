<?php

declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Produces implements OpenApiAttributeInterface
{
    /**
     * @param string[] $contentTypes The content types that can be produced.
     */
    public function __construct(
        public array $contentTypes = []
    ) {
    }
}
