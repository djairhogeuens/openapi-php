<?php

use OpenApi\Media\Schema;

class ApiResponse
{
    #[Schema(type: "integer", format: "int32")]
    public ?int $string;

    public ?string $type;

    public ?string $message;
}
