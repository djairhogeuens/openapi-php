<?php

namespace OpenApi\Attributes\Links;

use Attribute;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * Represents a parameter to pass to an operation as specified with operationId or identified via operationRef.
 **/
#[Attribute(0)]
class LinkParameter implements OpenApiAttributeInterface
{
    /**
     * @param string $name The name of this link parameter.
     * @param string $expression A constant or an expression to be evaluated and passed to the linked operation.
     */
    public function __construct(
        public string $name = "",
        public string $expression = ""
    ) {
    }
}
