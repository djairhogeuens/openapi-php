<?php

namespace OpenApi\Example;

use OpenApi\Attributes\Media\Schema;

class Category
{
    #[Schema(type: "integer", format: "int64", example: "1")]
    public ?int $id;

    #[Schema(example: "Dogs")]
    public ?string $name;
}
