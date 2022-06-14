<?php

declare(strict_types=1);

namespace OverlapBlocks\Shared\Infrastructure;

use OverlapBlocks\Shared\ApplicationService\CreateBlockBoardService;

final class CreateBlockBoardController
{
    private CreateBlockBoardService $createBlockBoardService;

    public function __construct(CreateBlockBoardService $createBlockBoardService)
    {
        $this->createBlockBoardService = $createBlockBoardService;
    }

    public function __invoke(int $width, int $length)
    {

    }
}