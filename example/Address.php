<?php

use OpenApi\Media\Schema;

class Address
{
    #[Schema(example: "437 Lytton")]
    public ?string $street;

    #[Schema(example: "Palo Alto")]
    public ?string $city;

    #[Schema(example: "CA")]
    public ?string $state;

    #[Schema(example: "94301")]
    public ?string $zip;
}
