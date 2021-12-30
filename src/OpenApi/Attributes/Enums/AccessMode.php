<?php

declare(strict_types=1);

namespace OpenApi\Attributes\Enums;

enum AccessMode: string
{
    case AUTO = "AUTO";
    case READ_ONLY = "READ_ONLY";
    case WRITE_ONLY = "WRITE_ONLY";
    case READ_WRITE = "READ_WRITE";
}
