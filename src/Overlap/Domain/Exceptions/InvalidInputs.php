<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Domain\Exceptions;

use RuntimeException;

final class InvalidInputs extends RuntimeException
{
    protected $code = 'INVALID_INPUT';
}