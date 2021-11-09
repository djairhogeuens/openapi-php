<?php

namespace OpenApi\Attributes\Info;

use Attribute;
use OpenApi\Attributes\Extensions\Extension;

/**
 * The attribute may be used in {@see Info::$contact} to define a contact for the OpenAPI spec.
 **/
#[Attribute(0)]
class Contact
{
    /**
     * @param string $name The identifying name of the contact person/organization.
     * @param string $url The URL pointing to the contact information. Must be in the format of a URL.
     * @param string $email The email address of the contact person/organization. Must be in the format of an email address.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public string $name = "",
        public string $url = "",
        public string $email = "",
        public array $extensions = []
    ) {
    }
}
