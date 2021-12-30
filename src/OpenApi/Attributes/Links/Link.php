<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Links;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;
use OpenApi\Attributes\Servers\Server;

/**
 * The attribute may be applied in {@see \OpenApi\Attributes\Responses\ApiResponse::$links} to add OpenAPI links to a response.
 **/
#[Attribute(Attribute::TARGET_CLASS)]
class Link implements OpenApiAttributeInterface
{
    /**
     * @param string $name The name of this link.
     * @param string $operationRef A relative or absolute reference to an OAS operation. This field is mutually exclusive of the operationId field, and must point to an Operation Object. Relative operationRef values may be used to locate an existing Operation Object in the OpenAPI definition. Ignored if the operationId property is specified.
     * @param string $operationId The name of an existing, resolvable OAS operation, as defined with a unique operationId. This field is mutually exclusive of the operationRef field.
     * @param LinkParameter[] $parameters Array of parameters to pass to an operation as specified with operationId or identified via operationRef.
     * @param string $description A description of the link. CommonMark syntax may be used for rich text representation.
     * @param string $requestBody A literal value or {expression} to use as a request body when calling the target operation.
     * @param Server|null $server An alternative server to service this operation.
     * @param Extension[] $extensions The list of optional extensions.
     * @param string $ref A reference to a link defined in components links.
     */
    public function __construct(
        public string $name = "",
        public string $operationRef = "",
        public string $operationId = "",
        public array $parameters = [],
        public string $description = "",
        public string $requestBody = "",
        public ?Server $server = null,
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
