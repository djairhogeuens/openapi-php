<?php declare(strict_types=1);

namespace OpenApi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER)]
class Patch extends Method
{
}
