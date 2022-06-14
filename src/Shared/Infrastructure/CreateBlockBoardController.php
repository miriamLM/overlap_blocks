<?php

declare(strict_types=1);

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