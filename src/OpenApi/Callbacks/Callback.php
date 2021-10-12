<?php

namespace OpenApi\Attributes\Callbacks;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Operation;

/**
 * The annotation may be used at method level to add one ore more callbacks to the operation definition.
 **/
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Callback
{
    /**
     * @param string $name The friendly name used to refer to this callback.
     * @param string $callbackUrlExpression An absolute URL which defines the destination which will be called with the supplied operation definition.
     * @param Operation[] $operation The array of operations that will be called out-of band.
     * @param Extension[] $extensions The list of optional extensions.
     * @param string $ref A reference to a Callback defined in components Callbacks.
     */
    public function __construct(
        public string $name = "",
        public string $callbackUrlExpression = "",
        public array $operation = [],
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
