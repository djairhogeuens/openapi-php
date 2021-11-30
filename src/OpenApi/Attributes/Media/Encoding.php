<?php declare(strict_types=1);

namespace OpenApi\Attributes\Media;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Headers\Header;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used to add encoding details to the definition of a parameter, request or response content,
 * by defining it as field {@see Content::$encoding}
 **/
#[Attribute(0)]
class Encoding implements OpenApiAttributeInterface
{
    /**
     * @param string $name The name of this encoding object instance.
     * This property is a key in encoding map of MediaType object and
     * MUST exist in a schema as a property.
     * @param string $contentType The Content-Type for encoding a specific property.
     * @param string $style Describes how a specific property value will be serialized depending on its type.
     * @param bool $explode When this is true, property values of type array or object generate separate parameters for each value of the array,
     * or key-value-pair of the map.
     * @param bool $allowReserved Determines whether the parameter value SHOULD allow reserved characters,
     * as defined by RFC3986 to be included without percent-encoding.
     * @param Header[] $headers An array of header objects.
     * @param Extension[] $extensions The list of optional extensions
     */
    public function __construct(
        public string $name = "",
        public string $contentType = "",
        public string $style = "",
        public bool $explode = false,
        public bool $allowReserved = false,
        public array $headers = [],
        public array $extensions = []
    ) {
    }
}
