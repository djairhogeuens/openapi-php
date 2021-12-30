<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * Represents an OAuth scope.
 **/
#[Attribute(0)]
class OAuthScope implements OpenApiAttributeInterface
{
    /**
     * @param string $name Name of the scope.
     * @param string $description Short description of the scope.
     */
    public function __construct(
        public string $name = "",
        public string $description = ""
    ) {
    }
}
