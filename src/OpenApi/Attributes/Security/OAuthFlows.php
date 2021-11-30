<?php declare(strict_types=1);

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\OpenApiAttributeInterface;

/**
 * Allows configuration of the supported OAuth Flows.
 **/
#[Attribute(0)]
class OAuthFlows implements OpenApiAttributeInterface
{
    /**
     * @param OAuthFlow|null $implicit Configuration for the OAuth Implicit flow.
     * @param OAuthFlow|null $password Configuration for the OAuth Resource Owner Password flow.
     * @param OAuthFlow|null $clientCredentials Configuration for the OAuth Client Credentials flow.
     * @param OAuthFlow|null $authorizationCode Configuration for the OAuth Authorization Code flow.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public ?OAuthFlow $implicit = null,
        public ?OAuthFlow $password = null,
        public ?OAuthFlow $clientCredentials = null,
        public ?OAuthFlow $authorizationCode = null,
        public array $extensions = []
    ) {
    }
}
