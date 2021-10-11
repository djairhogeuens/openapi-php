<?php

namespace OpenApi\Security;

use Attribute;

/**
 * Represents an OAuth scope.
 **/
#[Attribute(0)]
class OAuthScope
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
