<?php declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum ParameterIn: string
{
    case NONE = "";
    case HEADER = "header";
    case QUERY = "query";
    case PATH = "path";
    case COOKIE = "cookie";
}
