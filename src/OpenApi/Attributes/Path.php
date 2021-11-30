<?php declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Path implements OpenApiAttributeInterface
{
    public function __construct(
        public string $path
    ) {
    }
}
