<?php

namespace OpenApi\Extensions;

use Attribute;

/**
 * An optionally named list of extension properties.
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Extension
{
    /**
     * @param string $name An option name for these extensions.
     * @param ExtensionProperty[] $properties The extension properties.
     *
     * @see ExtensionProperty
     */
    public function __construct(
        public string $name = "",
        public array $properties = []
    ) {
    }
}
