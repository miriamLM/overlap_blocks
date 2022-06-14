<?php

declare(strict_types=1);

namespace OverlapBlocks\Shared\ApplicationService;


use OverlapBlocks\Shared\Domain\BlockBoard;

final class CreateBlockBoardService
{
    public function createBlockBoardRequestWithSize(SizeBlockBoardRequest $sizeBlockBoardRequest): void
    {
        $blockBoard = new BlockBoard($sizeBlockBoardRequest->widthValue(),$sizeBlockBoardRequest->legthValue());
    }
}