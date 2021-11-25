<?php

namespace OpenApi\Attributes\Servers;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be applied at class or method level, or in {@see \OpenApi\Attributes\Operation::$servers} to define servers for the
 * single operation (when applied at method level) or for all operations of a class (when applied at class level). It
 * can also be used in {@see \OpenApi\Attributes\OpenAPIDefinition::$servers} to define spec level servers.
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Server implements OpenApiAttributeInterface
{
    /**
     * @param string $url Required. A URL to the target host.
     * This URL supports Server Variables and may be relative, to indicate that the host location is relative to the location where the
     * OpenAPI definition is being served. Variable substitutions will be made when a variable is named in {brackets}.
     * @param string $description An optional string describing the host designated by the URL. CommonMark syntax MAY be used for rich text representation.
     * @param ServerVariable[] $variables An array of variables used for substitution in the server's URL template.
     * @param Extension[] $extensions The list of optional extensions
     */
    public function __construct(
        public string $url = "",
        public string $description = "",
        public array $variables = [],
        public array $extensions = []
    ) {
    }
}
