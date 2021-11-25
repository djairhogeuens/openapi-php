<?php

namespace OpenApi\Attributes;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Parameters\RequestBody;
use OpenApi\Attributes\Responses\ApiResponse;
use OpenApi\Attributes\Security\SecurityRequirement;
use OpenApi\Attributes\Servers\Server;
use OpenApi\Attributes\Tags\Tag;

/**
 * The attribute may be used to define a resource method as an OpenAPI Operation, and/or to define additional
 * properties for the Operation.
 *
 * The following fields can also alternatively be defined at method level (as repeatable attributes in case of arrays),
 * in this case method level attributes take precedence over {@see Operation} attribute fields:
 * <ul>
 * <li>tags: {@see Tags\Tag}</li>
 * <li>externalDocs: {@see ExternalDocumentation}</li>
 * <li>parameters: {@see Parameter}</li>
 * <li>responses: {@see Responses\ApiResponse}</li>
 * <li>security: {@see SecurityRequirement}</li>
 * <li>servers: {@see Servers\Server}</li>
 * <li>extensions: {@see Extensions\Extension}</li>
 * <li>hidden: {@see Hidden}</li>
 * </ul>
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Operation implements OpenApiAttributeInterface
{
    /**
     * @param string|null $method The HTTP method for this operation.
     * @param string[] $tags Tags can be used for logical grouping of operations by resources or any other qualifier.
     * @param string $summary Provides a brief description of this operation. Should be 120 characters or less for proper visibility in Swagger-UI.
     * @param string $description A verbose description of the operation.
     * @param RequestBody|null $requestBody Request body associated to the operation.
     * @param ExternalDocumentation|null $externalDocs Additional external documentation for this operation.
     * @param string $operationId The operationId is used by third-party tools to uniquely identify this operation.
     * @param Parameter[] $parameters An optional array of parameters which will be added to any automatically detected parameters in the method itself.
     * @param ApiResponse[] $responses The list of possible responses as they are returned from executing this operation.
     * @param bool $deprecated Allows an operation to be marked as deprecated.
     * @param SecurityRequirement[] $security A declaration of which security mechanisms can be used for this operation.
     * @param Server[] $servers An alternative server array to service this operation.
     * @param Extension[] $extensions The list of optional extensions.
     * @param bool $hidden Allows this operation to be marked as hidden.
     * @param bool $ignoreJsonView Ignores JsonView attributes while resolving operations and types.
     */
    public function __construct(
        public ?string $method = null,
        public array $tags = [],
        public string $summary = "",
        public string $description = "",
        public ?RequestBody $requestBody = null,
        public ?ExternalDocumentation $externalDocs = null,
        public string $operationId = "",
        public array $parameters = [],
        public array $responses = [],
        public bool $deprecated = false,
        public array $security = [],
        public array $servers = [],
        public array $extensions = [],
        public bool $hidden = false,
        public bool $ignoreJsonView = false
    ) {
    }
}
