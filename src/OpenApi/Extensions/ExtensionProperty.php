<?php

namespace OpenApi\Extensions;

use Attribute;

/**
 * A name/value property within a OpenApi extension
 *
 * @see Extension
 */
#[Attribute(Attribute::TARGET_CLASS)]
class ExtensionProperty
{
    /**
     * @param string $name The name of the property.
     * @param string $value The value of the property.
     * @param bool $parseValue If set to true, field `$value` will be parsed and serialized as JSON/YAML.
     */
    public function __construct(
        public string $name,
        public string $value,
        public bool $parseValue = false
    ) {
    }
}
