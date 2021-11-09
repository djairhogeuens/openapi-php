<?php

namespace OpenApi\Attributes\Security;

use Attribute;
use OpenApi\Attributes\Enums\SecuritySchemeIn;
use OpenApi\Attributes\Enums\SecuritySchemeType;

/**
 * The attribute may be used at class level (also on multiple classes) to add securitySchemes to spec
 * components section.
 **/
#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class SecurityScheme
{
    /**
     * @param string $type The type of the security scheme. Valid values are "apiKey", "http", "oauth2", "openIdConnect".
     * @param string $name The name identifying this security scheme
     * @param string $description A short description for security scheme. CommonMark syntax can be used for rich text representation.
     * @param string $paramName The name of the header or query parameter to be used. Applies to apiKey type.
     * Maps to "name" property of Security Scheme (OpenAPI specification).
     * @param string $in The location of the API key. Valid values are "query" or "header". Applies to apiKey type.
     * @param string $scheme The name of the HTTP Authorization scheme to be used in the Authorization header as defined in RFC 7235. Applies to http type.
     * @param string $bearerFormat A hint to the client to identify how the bearer token is formatted. Bearer tokens are usually generated by an
     * authorization server, so this information is primarily for documentation purposes. Applies to http ("bearer") type.
     * @param OAuthFlows|null $flows Required. An object containing configuration information for the flow types supported. Applies to oauth2 type.
     * @param string $openIdConnectUrl Required. OpenId Connect URL to discover OAuth2 configuration values. This MUST be in the form of a URL. Applies to openIdConnect.
     * @param array $extensions The list of optional extensions.
     * @param string $ref A reference to a SecurityScheme defined in components securitySchemes.
     */
    public function __construct(
        public string $type = SecuritySchemeType::DEFAULT,
        public string $name = "",
        public string $description = "",
        public string $paramName = "",
        public string $in = SecuritySchemeIn::DEFAULT,
        public string $scheme = "",
        public string $bearerFormat = "",
        public ?OAuthFlows $flows = null,
        public string $openIdConnectUrl = "",
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
