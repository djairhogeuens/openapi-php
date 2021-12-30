<?php

declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;

/**
 * The attribute may be used at method level or as field of {@see Operation} to add a reference to an external
 * resource for extended documentation of an Operation (OpenAPI specification).
 * It may also be used to add external documentation to {@see Tags\Tag},
 * {@see Headers\Header} or {@see Media\Schema}, or as field of {@see OpenAPIDefinition}.
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::TARGET_PARAMETER)]
class ExternalDocumentation implements OpenApiAttributeInterface
{
    /**
     * @param string $description A short description of the target documentation.
     * @param string $url The URL for the target documentation. Value must be in the format of a URL.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public string $description = "",
        public string $url = "",
        public array $extensions = []
    ) {
    }
}
