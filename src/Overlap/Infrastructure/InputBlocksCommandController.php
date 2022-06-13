<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Infrastructure;

final class InputBlocksCommandController
{
    public function explodeInputBlocks(string $inputBlocks): void
    {
        echo "$inputBlocks";
    }
}