<?php

namespace OpenApi\Info;

use Attribute;
use OpenApi\Extensions\Extension;

/**
 * The annotation may be used in {@see Info#$license} to define a license for the OpenAPI spec.
 *
 * @see OpenAPIDefinition
 * @see Info
 **/
#[Attribute(0)]
class License
{
    /**
     * @param string $name The license name used for the API.
     * @param string $url A URL to the license used for the API. MUST be in the format of a URL.
     * @param Extension[] $extension The list of optional extensions.
     */
    public function __construct(
        public string $name = "",
        public string $url = "",
        public array $extension = []
    ) {
    }
}
