<?php

namespace OpenApi\Attributes\Media;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;

/**
 * The annotation may be used to add one or more examples to the definition of a parameter, request or response content,
 * by defining it as field {@see Parameter#$examples} or {@see Content#$examples}
 *
 **/
#[Attribute(Attribute::TARGET_CLASS)]
class ExampleObject
{
    /**
     * @param string $name A unique name to identify this particular example
     * @param string $summary A brief summary of the purpose or context of the example
     * @param string $value A string representation of the example. This is mutually exclusive with the `$externalValue` property, and ignored if the `$externalValue` property is specified.  If the media type associated with the example allows parsing into an object, it may be converted from a string
     * @param string $externalValue A URL to point to an external document to be used as an example. This is mutually exclusive with the `$value` property.
     * @param Extension[] $extensions The list of optional extensions.
     * @param string $ref A reference to a example defined in components examples.
     * @param string $description A description of the purpose or context of the example.
     */
    public function __construct(
        public string $name = "",
        public string $summary = "",
        public string $value = "",
        public string $externalValue = "",
        public array $extensions = [],
        public string $ref = "",
        public string $description = ""
    ) {
    }
}
