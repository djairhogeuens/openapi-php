<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Servers;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * An object representing a Server Variable for server URL template substitution.
 **/
#[Attribute(0)]
class ServerVariable implements OpenApiAttributeInterface
{
    /**
     * @param string $name Required. The name of this variable.
     * @param string[] $allowableValues An array of allowable values for this variable. This field map to the enum property in the OAS schema.
     * @param string $defaultValue Required. The default value of this variable.
     * @param string $description An optional description for the server variable.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public string $name,
        public string $defaultValue,
        public array $allowableValues = [],
        public string $description = "",
        public array $extensions = []
    ) {
    }
}
