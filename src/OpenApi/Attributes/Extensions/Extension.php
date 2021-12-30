<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Extensions;

use Attribute;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * An optionally named list of extension properties.
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Extension implements OpenApiAttributeInterface
{
    /**
     * @param string $name An option name for these extensions.
     * @param ExtensionProperty[] $properties The extension properties.
     */
    public function __construct(
        public string $name = "",
        public array $properties = []
    ) {
    }
}
