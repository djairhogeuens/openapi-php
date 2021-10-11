<?php

use DateTime;
use OpenApi\Media\Schema;

class Order
{
    #[Schema(type: "integer", format: "int64", example: "10")]
    public ?int $id;

    #[Schema(type: "integer", format: "int64", example: "198772")]
    public ?int $petId;

    #[Schema(type: "integer", format: "int32", example: "7")]
    public ?int $quantity;

    public ?DateTime $shipDate;

    #[Schema(description: "Order Status", example: "approved", oneOf: ["placed", "approved", "delivered"])]
    public ?string $status;

    public ?bool $complete;
}
