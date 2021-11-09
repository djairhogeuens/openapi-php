<?php

namespace OpenApi\Attributes\Parameters;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Media\Content;

/**
 * The attribute may be used on a method parameter to define it as the Request Body of the operation, and/or to define
 * additional properties for such request body.
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS)]
class RequestBody
{
    /**
     * @param string $description A brief description of the request body.
     * @param Content[] $content The content of the request body.
     * @param bool $required Determines if the request body is required in the request. Defaults to false.
     * @param Extension[] $extensions The list of optional extensions
     * @param string $ref A reference to a RequestBody defined in components RequestBodies.
     */
    public function __construct(
        public string $description = "",
        public array $content = [],
        public bool $required = false,
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
