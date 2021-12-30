<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Tags;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\ExternalDocumentation;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be applied at class or method level, or in {@see \OpenApi\Attributes\Operation::$tags} to define tags for the
 * single operation (when applied at method level) or for all operations of a class (when applied at class level).
 * It can also be used in {@see \OpenApi\Attributes\OpenAPIDefinition::$tags} to define spec level tags.
 * When applied at method or class level, if only a name is provided, the tag will be added to operation only;
 * if additional fields are also defined, like description or externalDocs, the Tag will also be added to openAPI.tags
 * field
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Tag implements OpenApiAttributeInterface
{
    /**
     * @param string $name The name of this tag.
     * @param string $description A short description for this tag.
     * @param ExternalDocumentation|null $externalDocs Additional external documentation for this tag.
     * @param Extension[] $extensions The list of optional extensions.
     * @return void
     */
    public function __construct(
        public string $name,
        public string $description = "",
        public ?ExternalDocumentation $externalDocs = null,
        public array $extensions = []
    ) {
    }
}
