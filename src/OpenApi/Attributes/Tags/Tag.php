<?php

namespace OpenApi\Attributes\Tags;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\ExternalDocumentation;

/**
 * The annotation may be applied at class or method level, or in {@see Operation#$tags} to define tags for the
 * single operation (when applied at method level) or for all operations of a class (when applied at class level).
 * <p>It can also be used in {@see OpenAPIDefinition#$tags} to define spec level tags.</p>
 * <p>When applied at method or class level, if only a name is provided, the tag will be added to operation only;
 * if additional fields are also defined, like description or externalDocs, the Tag will also be added to openAPI.tags
 * field</p>
 *
 * @see OpenAPIDefinition
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Tag
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
