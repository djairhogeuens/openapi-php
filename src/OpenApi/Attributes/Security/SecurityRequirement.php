<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * The attribute may be applied at class or method level, or in {@see \OpenApi\Attributes\Operation::$security} to define security requirements for the
 * single operation (when applied at method level) or for all operations of a class (when applied at class level).
 * It can also be used in {@see \OpenApi\Attributes\OpenAPIDefinition::$security} to define spec level security.
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class SecurityRequirement implements OpenApiAttributeInterface
{
    /**
     * @param string $name This name must correspond to a declared SecurityRequirement.
     * @param string[] $scopes If the security scheme is of type "oauth2" or "openIdConnect", then the value is a list of scope names required for the execution.
     * For other security scheme types, the array must be empty.
     */
    public function __construct(
        public string $name,
        public array $scopes = []
    ) {
    }
}
