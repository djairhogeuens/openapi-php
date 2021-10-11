<?php

namespace OpenApi\Info;

use Attribute;
use OpenApi\Extensions\Extension;

/**
 * The annotation may be used in {@see OpenAPIDefinition#$info} to populate the Info section of the OpenAPI document.
 *
 * @see OpenAPIDefinition
 **/
#[Attribute(Attribute::TARGET_CLASS)]
class Info
{
    /**
     * @param string $title The title of the application.
     * @param string $description A short description of the application. CommonMark syntax can be used for rich text representation.
     * @param string $termsOfService A URL to the Terms of Service for the API. Must be in the format of a URL.
     * @param Contact $contact The contact information for the exposed API.
     * @param License $license The license information for the exposed API.
     * @param string $version The version of the API definition.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public string $title = "",
        public string $description = "",
        public string $termsOfService = "",
        public ?Contact $contact = null,
        public ?License $license = null,
        public string $version = "",
        public array $extensions = []
    ) {
        if ($contact == null) {
            $this->contact = new Contact();
        }
        if ($license == null) {
            $this->license = new License();
        }
    }
}
