<?php

declare(strict_types=1);

namespace OpenApi\Example;

use OpenApi\Attributes\Media\Schema;

class ApiResponse
{
    #[Schema(type: "integer", format: "int32")]
    public ?int $string;

    public ?string $type;

    public ?string $message;
}
