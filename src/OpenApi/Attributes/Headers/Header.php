<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Headers;

use Attribute;
use OpenApi\Attributes\Media\Schema;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used to add one or more headers to the definition of a response or as attribute of content
 * encoding by defining it as field {@see \OpenApi\Attributes\Responses\ApiResponse::$headers} or {@see \OpenApi\Attributes\Media\Content::$encoding}.
 * Please note that request headers are defined as Header {@see \OpenApi\Attributes\Parameter}.
 **/
#[Attribute(0)]
class Header implements OpenApiAttributeInterface
{
    /**
     * @param string $name Required: The name of the header. The name is only used as the key to store this header in a map.
     * @param string $description Additional description data to provide on the purpose of the header
     * @param Schema|null $schema The schema defining the type used for the header. Ignored if the properties content or array are specified.
     * @param bool $required Determines whether this header is mandatory. The property may be included and its default value is false.
     * @param bool $deprecated Specifies that a header is deprecated and should be transitioned out of usage.
     * @param string $ref A reference to a header defined in components headers.
     */
    public function __construct(
        public string $name,
        public string $description = "",
        public ?Schema $schema = null,
        public bool $required = false,
        public bool $deprecated = false,
        public string $ref = ""
    ) {
    }
}
