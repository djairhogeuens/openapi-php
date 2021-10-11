<?php

namespace OpenApi\Media;

use Attribute;
use OpenApi\Enums\AccessMode;
use OpenApi\Extensions\Extension;
use OpenApi\ExternalDocumentation;

/**
 * The annotation may be used to define a Schema for a set of elements of the OpenAPI spec, and/or to define additional
 * properties for the schema. It is applicable e.g. to parameters, schema classes (aka "models"), properties of such
 * models, request and response content, header.
 *
 * <p>The annotation {@see ArraySchema} shall be used for array elements; {@see ArraySchema} and {@see Schema} cannot
 * coexist</p>
 *
 * @see ArraySchema
 **/
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Schema
{
    /**
     * @param class-string|null $implementation Provides a PHP class as implementation for this schema. When provided, additional information in the Schema annotation (except for type information) will augment the PHP class after introspection.
     * @param class-string|null $not Provides a PHP class to be used to disallow matching properties.
     * @param class-string[] $oneOf Provides an array of PHP class implementations which can be used to describe multiple acceptable schemas. If more than one match the derived schemas, a validation error will occur.
     * @param class-string[] $anyOf Provides an array of PHP class implementations which can be used to describe multiple acceptable schemas. If any match, the schema will be considered valid.
     * @param class-string[] $allOf Provides an array of PHP class implementations which can be used to describe multiple acceptable schemas. If all match, the schema will be considered valid
     * @param string $name The name of the schema or property.
     * @param string $title A title to explain the purpose of the schema.
     * @param float|int $multipleOf Constrains a value such that when divided by the multipleOf, the remainder must be an integer. Ignored if the value is 0.
     * @param string $maximum Sets the maximum numeric value for a property. Ignored if the value is an empty string.
     * @param bool $exclusiveMaximum If true, makes the maximum value exclusive, or a less-than criteria.
     * @param string $minimum Sets the minimum numeric value for a property. Ignored if the value is an empty string or not a number.
     * @param bool $exclusiveMinimum If true, makes the minimum value exclusive, or a greater-than criteria.
     * @param int $maxLength Sets the maximum length of a string value. Ignored if the value is negative.
     * @param int $minLength Sets the minimum length of a string value. Ignored if the value is negative.
     * @param string $pattern A pattern that the value must satisfy. Ignored if the value is an empty string.
     * @param int $maxProperties Constrains the number of arbitrary properties when additionalProperties is defined. Ignored if value is 0.
     * @param int $minProperties Constrains the number of arbitrary properties when additionalProperties is defined. Ignored if value is 0.
     * @param string[] $requiredProperties Allows multiple properties in an object to be marked as required.
     * @param bool $required Mandates that the annotated item is required or not.
     * @param string $description A description of the schema.
     * @param string $format Provides an optional override for the format. If a consumer is unaware of the meaning of the format, they shall fall back to using the basic type without format.  For example, if \&quot;type: integer, format: int128\&quot; were used to designate a very large integer, most consumers will not understand how to handle it, and fall back to simply \&quot;type: integer\&quot;
     * @param string $ref References a schema definition in an external OpenAPI document.
     * @param bool $nullable If true, designates a value as possibly null.
     * @param string $accessMode Allows to specify the access mode (AccessMode.READ_ONLY, READ_WRITE)
     * AccessMode.READ_ONLY: value will not be written to during a request but may be returned during a response.
     * AccessMode.WRITE_ONLY: value will only be written to during a request but not returned during a response.
     * AccessMode.READ_WRITE: value will be written to during a request and returned during a response.
     * @param string $example Provides an example of the schema. When associated with a specific media type, the example string shall be parsed by the consumer to be treated as an object or an array.
     * @param ExternalDocumentation $externalDocs Additional external documentation for this schema.
     * @param bool $deprecated Specifies that a schema is deprecated and should be transitioned out of usage.
     * @param string $type Provides an override for the basic type of the schema. Must be a valid type per the OpenAPI Specification.
     * @param string[] $allowableValues Provides a list of allowable values. This field map to the enum property in the OAS schema.
     * @param string $defaultValue Provides a default value.
     * @param string $discriminatorProperty Provides a discriminator property value.
     * @param DiscriminatorMapping[] $discriminatorMapping Provides discriminator mapping values.
     * @param bool $hidden Allows schema to be marked as hidden.
     * @param bool $enumAsRef Allows enums to be resolved as a reference to a scheme added to components section.
     * @param class-string[] $subTypes An array of the sub types inheriting from this model.
     * @param Extension[] $extensions The list of optional extensions.
     */
    public function __construct(
        public ?string $implementation = null,
        public ?string $not = null,
        public array $oneOf = [],
        public array $anyOf = [],
        public array $allOf = [],
        public string $name = "",
        public string $title = "",
        public float $multipleOf = 0,
        public string $maximum = "",
        public bool $exclusiveMaximum = false,
        public string $minimum = "",
        public bool $exclusiveMinimum = false,
        public int $maxLength = PHP_INT_MAX,
        public int $minLength = 0,
        public string $pattern = "",
        public int $maxProperties = 0,
        public int $minProperties = 0,
        public array $requiredProperties = [],
        public bool $required = false,
        public string $description = "",
        public string $format = "",
        public string $ref = "",
        public bool $nullable = false,
        public string $accessMode = AccessMode::AUTO,
        public string $example = "",
        public ?ExternalDocumentation $externalDocs = null,
        public bool $deprecated = false,
        public string $type = "",
        public array $allowableValues = [],
        public string $defaultValue = "",
        public string $discriminatorProperty = "",
        public array $discriminatorMapping = [],
        public bool $hidden = false,
        public bool $enumAsRef = false,
        public array $subTypes = [],
        public array $extensions = []
    ) {
        if ($externalDocs == null) {
            $this->externalDocs = new ExternalDocumentation();
        }
    }
}
