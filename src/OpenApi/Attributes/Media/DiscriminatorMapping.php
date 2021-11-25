<?php

namespace OpenApi\Attributes\Media;

use Attribute;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used in {@see Schema::$discriminatorMapping} to define an optional mapping definition
 * in scenarios involving composition / inheritance where the value of the discriminator field does not match the schema
 * name or implicit mapping is not possible.
 *
 * Use {@see Schema::$discriminatorProperty} to define a discriminator property.
 **/
#[Attribute(0)]
class DiscriminatorMapping implements OpenApiAttributeInterface
{
    /**
     * @param string $value The property value that will be mapped to a Schema.
     * @param class-string|null $schema The schema that is being mapped to a property value.
     */
    public function __construct(
        public string $value = "",
        public ?string $schema = null
    ) {
    }
}
