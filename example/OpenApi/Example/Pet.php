<?php

namespace OpenApi\Example;

use OpenApi\Attributes\Media\Schema;

class Pet
{
    #[Schema(type: "integer", format: "int64", example: "10")]
    public ?int $id;

    #[Schema(example: "doggie", required: true)]
    public string $name;

    public ?Category $category;

    /**
     * @var string[]
     */
    #[Schema(required: true)]
    public array $photoUrls;

    /**
     * @var Tag[]
     */
    public ?array $tags;

    #[Schema(description: "pet status in the store", oneOf: ["available", "pending", "sold"])]
    public ?string $status;
}
