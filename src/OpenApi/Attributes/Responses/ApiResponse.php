<?php

namespace OpenApi\Attributes\Responses;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Headers\Header;
use OpenApi\Attributes\Links\Link;
use OpenApi\Attributes\Media\Content;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used at method level or as field of {@see \OpenApi\Attributes\Operation} to define one or more responses of the
 * Operation.
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class ApiResponse implements OpenApiAttributeInterface
{
    /**
     * @param string $description A short description of the response.
     * @param string $responseCode The HTTP response code, or 'default', for the supplied response. May only have 1 default entry.
     * @param Header[] $headers An array of response headers. Allows additional information to be included with response.
     * @param Link[] $links An array of operation links that can be followed from the response.
     * @param Content[] $content An array containing descriptions of potential response payloads, for different media types.
     * @param Extension[] $extensions The list of optional extensions.
     * @param string $ref A reference to a response defined in components responses.
     */
    public function __construct(
        public string $description = "",
        public string $responseCode = "default",
        public array $headers = [],
        public array $links = [],
        public array $content = [],
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
