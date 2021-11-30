<?php declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;

/**
 * Marks a given resource, class or bean type as hidden, skipping while reading / resolving
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::TARGET_PROPERTY)]
class Hidden implements OpenApiAttributeInterface
{
}
