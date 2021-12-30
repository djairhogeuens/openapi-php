<?php

declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Consumes implements OpenApiAttributeInterface
{
    /**
     * @param string[] $contentTypes The content types that can be consumed.
     */
    public function __construct(
        public array $contentTypes = []
    ) {
    }
}
