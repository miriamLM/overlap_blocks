<?php

declare(strict_types=1);

use OverlapBlocks\Overlap\ApplicationService\InputBlockService;
use OverlapBlocks\Overlap\Infrastructure\InputBlocksCommandController;
use OverlapBlocks\Shared\ApplicationService\CreateBlockBoardService;
use OverlapBlocks\Shared\Infrastructure\CreateBlockBoardController;


require_once '../vendor/autoload.php';

if (isset($argv)) {
    try {
        $blockInput = count($argv) === 1 ? "" : $argv[1];

        $inputBlockService = new InputBlockService();
        $inputBlockCommandController = new InputBlocksCommandController($inputBlockService);
        $inputBlockCommandController->explodeInputBlocks($blockInput);

    } catch (RuntimeException $exception) {
    }

    return;
}