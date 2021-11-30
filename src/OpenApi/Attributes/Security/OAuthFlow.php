<?php declare(strict_types=1);

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * Configuration details for a supported OAuth Flow.
 **/
#[Attribute(0)]
class OAuthFlow implements OpenApiAttributeInterface
{
    /**
     * @param string $authorizationUrl The authorization URL to be used for this flow. This must be in the form of a URL. Applies to oauth2 ("implicit", "authorizationCode") type.
     * @param string $tokenUrl The token URL to be used for this flow. This must be in the form of a URL. Applies to oauth2 ("password", "clientCredentials", "authorizationCode") type.
     * @param string $refreshUrl The URL to be used for obtaining refresh tokens. This must be in the form of a URL. Applies to oauth2 type.
     * @param OAuthScope[] $scopes The available scopes for the OAuth2 security scheme. Applies to oauth2 type.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public string $authorizationUrl = "",
        public string $tokenUrl = "",
        public string $refreshUrl = "",
        public array $scopes = [],
        public array $extensions = []
    ) {
    }
}
