<?php

namespace OpenApi\Attributes;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Info\Info;
use OpenApi\Attributes\Security\SecurityRequirement;
use OpenApi\Attributes\Servers\Server;
use OpenApi\Attributes\Tags\Tag;

/**
 * The annotation that may be used to populate OpenAPI Object fields info, tags, servers, security and externalDocs
 * If more than one class is annotated with {@see OpenAPIDefinition}, with the same fields defined, behaviour is inconsistent.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class OpenAPIDefinition
{
    /**
     * @param Info $info Provides metadata about the API. The metadata MAY be used by tooling as required.
     * @param Tag[] $tags A list of tags used by the specification with additional metadata.
     * The order of the tags can be used to reflect on their order by the parsing tools.
     * @param Server[] $servers An array of Server Objects, which provide connectivity information to a target server.
     * If the servers property is not provided, or is an empty array, the default value would be a Server Object with a url value of /.
     * @param SecurityRequirement[] $security A declaration of which security mechanisms can be used across the API.
     * @param ExternalDocumentation $externalDocs Any additional external documentation for the API.
     * @param Extension[] $extensions The list of optional extensions.
     * @return void
     */
    public function __construct(
        public ?Info $info = null,
        public array $tags = [],
        public array $servers = [],
        public array $security = [],
        public ?ExternalDocumentation $externalDocs = null,
        public array $extensions = []
    ) {
        if ($info == null) {
            $this->info = new Info();
        }
        if ($externalDocs == null) {
            $this->externalDocs = new ExternalDocumentation();
        }
    }
}
