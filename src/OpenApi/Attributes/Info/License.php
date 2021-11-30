<?php declare(strict_types=1);

namespace OpenApi\Attributes\Info;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used in {@see Info::$license} to define a license for the OpenAPI spec.
 **/
#[Attribute(0)]
class License implements OpenApiAttributeInterface
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
