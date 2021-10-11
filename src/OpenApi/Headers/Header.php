<?php

namespace OpenApi\Headers;

use Attribute;
use OpenApi\Media\Schema;

/**
 * The annotation may be used to add one or more headers to the definition of a response or as attribute of content
 * encoding by defining it as field {@see ApiResponse#$headers} or {@see Content#$encoding}.
 * <p>Please note that request headers are defined as Header {@see Parameter}.</p>
 *
 * @see ApiResponse
 * @see Parameter
 * @see Encoding
 **/
#[Attribute(0)]
class Header
{
    /**
     * @param string $name Required: The name of the header. The name is only used as the key to store this header in a map.
     * @param string $description Additional description data to provide on the purpose of the header
     * @param Schema $schema The schema defining the type used for the header. Ignored if the properties content or array are specified.
     * @param bool $required Determines whether this header is mandatory. The property may be included and its default value is false.
     * @param bool $deprecated Specifies that a header is deprecated and should be transitioned out of usage.
     * @param string $ref A reference to a header defined in components headers.
     */
    public function __construct(
        public string $name,
        public string $description = "",
        public ?Schema $schema = null,
        public bool $required = false,
        public bool $deprecated = false,
        public string $ref = ""
    ) {
        if ($schema == null) {
            $this->schema = new Schema();
        }
    }
}
