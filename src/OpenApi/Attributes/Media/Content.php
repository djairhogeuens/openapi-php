<?php

namespace OpenApi\Attributes\Media;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be used to define the content/media type  of a parameter, request or response, by defining it as
 * field {@see \OpenApi\Attributes\Parameter::$content}, {@see \OpenApi\Attributes\Parameters\RequestBody::$content} or {@see \OpenApi\Attributes\Responses\ApiResponse::$content}.
 **/
#[Attribute(Attribute::TARGET_CLASS)]
class Content implements OpenApiAttributeInterface
{
    /**
     * @param string $mediaType The media type that this object applies to.
     * @param ExampleObject[] $examples An array of examples used to show the use of the associated schema.
     * @param Schema|null $schema The schema defining the type used for the content.
     * @param ArraySchema|null $array The schema of the array that defines the type used for the content.
     * @param Encoding[] $encoding An array of encodings. The key, being the property name, MUST exist in the schema as a property.
     * @param Extension[] $extensions The list of optional extensions
     */
    public function __construct(
        public string $mediaType = "",
        public array $examples = [],
        public ?Schema $schema = null,
        public ?ArraySchema $array = null,
        public array $encoding = [],
        public array $extensions = []
    ) {
    }
}
