<?php

namespace OpenApi\Attributes\Media;

use Attribute;

/**
 * The annotation may be used in {@see Schema#$discriminatorMapping} to define an optional mapping definition
 * in scenarios involving composition / inheritance where the value of the discriminator field does not match the schema
 * name or implicit mapping is not possible.
 *
 * <p>Use {@see Schema#$discriminatorProperty} to define a discriminator property.</p>
 *
 * @see Schema
 **/
#[Attribute(0)]
class DiscriminatorMapping
{
    /**
     * @param string $value The property value that will be mapped to a Schema.
     * @param class-string $schema The schema that is being mapped to a property value.
     */
    public function __construct(
        public string $value = "",
        public ?string $schema = null
    ) {
    }
}
