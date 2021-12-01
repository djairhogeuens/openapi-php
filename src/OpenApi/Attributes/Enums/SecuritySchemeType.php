<?php declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum SecuritySchemeType: string
{
    case APIKEY = "apiKey";
    case HTTP = "http";
    case OPENIDCONNECT = "openIdConnect";
    case OAUTH2 = "oauth2";
}
