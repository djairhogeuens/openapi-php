<?php declare(strict_types=1);

namespace OpenApi\Example;

use OpenApi\Attributes\Media\Schema;

class User
{
    #[Schema(type: "integer", format: "int64", example: "10")]
    public ?int $id;

    #[Schema(example: "theUser")]
    public ?string $username;

    #[Schema(example: "John")]
    public ?string $firstName;

    #[Schema(example: "James")]
    public ?string $lastName;

    #[Schema(example: "john@email.com")]
    public ?string $email;

    #[Schema(example: "12345")]
    public ?string $password;

    #[Schema(example: "12345")]
    public ?string $phone;

    #[Schema(type: "integer", description: "User Status", format: "int32", example: "1")]
    public ?int $userStatus;
}
