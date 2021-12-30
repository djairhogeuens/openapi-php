<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum ParameterStyle: string
{
    case MATRIX = "matrix";
    case LABEL = "label";
    case FORM = "form";
    case SPACEDELIMITED = "spaceDelimited";
    case PIPEDELIMITED = "pipeDelimited";
    case DEEPOBJECT = "deepObject";
    case SIMPLE = "simple";
}
