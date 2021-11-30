<?php declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum SecuritySchemeType: string
{
    case NONE = "";
    case APIKEY = "apiKey";
    case HTTP = "http";
    case OPENIDCONNECT = "openIdConnect";
    case OAUTH2 = "oauth2";
}
