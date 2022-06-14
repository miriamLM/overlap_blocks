<?php

declare(strict_types=1);

namespace OverlapBlocks\Shared\Infrastructure;

use OverlapBlocks\Shared\ApplicationService\CreateBlockBoardService;
use OverlapBlocks\Shared\ApplicationService\SizeBlockBoardRequest;

final class CreateBlockBoardController
{
    private CreateBlockBoardService $createBlockBoardService;

    public function __construct(CreateBlockBoardService $createBlockBoardService)
    {
        $this->createBlockBoardService = $createBlockBoardService;
    }

    public function __invoke(int $width, int $length)
    {
        $sizeBlockBoardRequest = new SizeBlockBoardRequest($width, $length);

    }
}