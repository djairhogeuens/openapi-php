<?php declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum SecuritySchemeIn: string
{
    case HEADER = "header";
    case QUERY = "query";
    case COOKIE = "cookie";
}
