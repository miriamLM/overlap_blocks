<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;

use OverlapBlocks\Overlap\Domain\Block;

final class InputBlocksResponse
{
    private Block $firstBlock;
    private Block $secondBlock;

    public function __construct(Block $firstBlock, Block $secondBlock)
    {
        $this->firstBlock = $firstBlock;
        $this->secondBlock = $secondBlock;
    }

    public function firstBlockValue(): Block
    {
        return $this->firstBlock;
    }

    public function secondBlockValue(): Block
    {
        return $this->secondBlock;
    }
}