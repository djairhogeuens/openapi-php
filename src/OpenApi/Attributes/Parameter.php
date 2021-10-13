<?php

namespace OpenApi\Attributes;

use Attribute;
use OpenApi\Attributes\Enums\Explode;
use OpenApi\Attributes\Enums\ParameterIn;
use OpenApi\Attributes\Enums\ParameterStyle;
use OpenApi\Attributes\Extensions\Extension;
use OpenApi\Attributes\Media\ArraySchema;
use OpenApi\Attributes\Media\Content;
use OpenApi\Attributes\Media\ExampleObject;
use OpenApi\Attributes\Media\Schema;

/**
 * The annotation may be used on a method parameter to define it as a parameter for the operation, and/or to define
 * additional properties for the Parameter. It can also be used independently in {@see Operation#$parameters} or at
 * method level to add a parameter to the operation, even if not bound to any method parameter.
 *
 * <p>For method parameters bound to the request body, see {@see RequestBody}</p>
 *
 * @see RequestBody
 * @see Operation
 * @see Schema
 **/
#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_METHOD | Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Parameter
{
    /**
     * @param string $name The name of the parameter.
     * @param string $in The location of the parameter. Possible values are "query", "header", "path" or "cookie". Ignored when empty string.
     * @param string $description Additional description data to provide on the purpose of the parameter
     * @param bool $required Determines whether this parameter is mandatory. If the parameter location is "path", this property is required and its value must be true. Otherwise, the property may be included and its default value is false.
     * @param bool $deprecated Specifies that a parameter is deprecated and should be transitioned out of usage.
     * @param bool $allowEmptyValue When true, allows sending an empty value. If false, the parameter will be considered \&quot;null\&quot; if no value is present.  This may create validation errors when the parameter is required.
     * @param string $style Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for query - form; for path - simple; for header - simple; for cookie - form. Ignored if the properties content or array are specified.
     * @param string $explode When this is true, parameter values of type array or object generate separate parameters for each value of the array or key-value pair of the map. For other types of parameters this property has no effect. When style is form, the default value is true. For all other styles, the default value is false. Ignored if the properties content or array are specified.
     * @param bool $allowReserved Determines whether the parameter value should allow reserved characters, as defined by RFC3986. This property only applies to parameters with an in value of query. The default value is false. Ignored if the properties content or array are specified.
     * @param Schema|null $schema The schema defining the type used for the parameter. Ignored if the properties content or array are specified.
     * @param ArraySchema|null $array The schema of the array that defines this parameter. Ignored if the property content is specified.
     * @param Content[] $content The representation of this parameter, for different media types.
     * @param bool $hidden Allows this parameter to be marked as hidden.
     * @param ExampleObject[] $examples An array of examples  of the schema used to show the use of the associated schema.
     * @param string $example Provides an example of the schema. When associated with a specific media type, the example string shall be parsed by the consumer to be treated as an object or an array. Ignored if the properties examples, content or array are specified.
     * @param Extension[] $extensions The list of optional extensions.
     * @param string $ref A reference to a parameter defined in components parameter.
     */
    public function __construct(
        public string $name = "",
        public string $in = ParameterIn::DEFAULT,
        public string $description = "",
        public bool $required = false,
        public bool $deprecated = false,
        public bool $allowEmptyValue = false,
        public string $style = ParameterStyle::DEFAULT,
        public string $explode = Explode::DEFAULT,
        public bool $allowReserved = false,
        public ?Schema $schema = null,
        public ?ArraySchema $array = null,
        public array $content = [],
        public bool $hidden = false,
        public array $examples = [],
        public string $example = "",
        public array $extensions = [],
        public string $ref = ""
    ) {
    }
}
