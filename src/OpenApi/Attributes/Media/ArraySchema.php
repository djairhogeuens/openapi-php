<?php

namespace OpenApi\Attributes\Media;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;

/**
 * The annotation may be used to define a schema of type "array" for a set of elements of the OpenAPI spec, and/or to define additional
 * properties for the schema. It is applicable e.g. to parameters, schema classes (aka "models"), properties of such
 * models, request and response content, header. The annotation {@see Schema} shall be used for non array elements; {@see ArraySchema} and {@see Schema} cannot
 * coexist.
 *
 * @see Schema
 **/
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS)]
class ArraySchema
{
    /**
     * @param Schema|null $schema The schema of the items in the array.
     * @param Schema|null $arraySchema Allows to define the properties to be resolved into properties of the schema of type `array` (not the ones of the `$items` of such schema which are defined in {@see #$schema schema}.
     * @param int $maxItems Sets the maximum number of items in an array. Ignored if value is PHP_INT_MIN.
     * @param int $minItems Sets the minimum number of items in an array. Ignored if value is PHP_INT_MAX.
     * @param bool $uniqueItems Determines whether an array of items will be unique.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public ?Schema $schema = null,
        public ?Schema $arraySchema = null,
        public int $maxItems = PHP_INT_MIN,
        public int $minItems = PHP_INT_MAX,
        public bool $uniqueItems = false,
        public array $extensions = []
    ) {
    }
}
