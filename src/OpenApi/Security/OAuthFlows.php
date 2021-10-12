<?php

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;

/**
 * Allows configuration of the supported OAuth Flows.
 **/
#[Attribute(0)]
class OAuthFlows
{
    /**
     * @param OAuthFlow $implicit Configuration for the OAuth Implicit flow.
     * @param OAuthFlow $password Configuration for the OAuth Resource Owner Password flow.
     * @param OAuthFlow $clientCredentials Configuration for the OAuth Client Credentials flow.
     * @param OAuthFlow $authorizationCode Configuration for the OAuth Authorization Code flow.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public ?OAuthFlow $implicit = null,
        public ?OAuthFlow $password = null,
        public ?OAuthFlow $clientCredentials = null,
        public ?OAuthFlow $authorizationCode = null,
        public array $extensions = []
    ) {
        if ($implicit == null) {
            $this->implicit = new OAuthFlow();
        }
        if ($password == null) {
            $this->password = new OAuthFlow();
        }
        if ($clientCredentials == null) {
            $this->clientCredentials = new OAuthFlow();
        }
        if ($authorizationCode == null) {
            $this->authorizationCode = new OAuthFlow();
        }
    }
}
