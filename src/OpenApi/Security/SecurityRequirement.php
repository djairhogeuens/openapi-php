<?php

namespace OpenApi\Security;

use Attribute;

/**
 * The annotation may be applied at class or method level, or in {@see Operation#$security} to define security requirements for the
 * single operation (when applied at method level) or for all operations of a class (when applied at class level).
 * <p>It can also be used in {@see OpenAPIDefinition#$security} to define spec level security.</p>
 *
 * @see OpenAPIDefinition
 * @see Operation
 **/
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class SecurityRequirement
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
