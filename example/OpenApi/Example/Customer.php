<?php

namespace OpenApi\Example;

use OpenApi\Attributes\Media\Schema;

class Customer
{
    #[Schema(type: "integer", format: "int64", example: "100000")]
    public ?int $id;

    #[Schema(example: "fehguy")]
    public ?string $username;

    /**
     * @var null|Address[]
     */
    public ?array $addresses;
}
