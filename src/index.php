<?php

declare(strict_types=1);

use OverlapBlocks\Overlap\ApplicationService\InputBlockService;
use OverlapBlocks\Overlap\Infrastructure\InputBlocksCommandController;

require_once '../vendor/autoload.php';

if (isset($argv)) {
    try {
        $blockInput = count($argv) === 1 ? "" : $argv[1];
        //echo "$blockInput";
        $inputBlockService = new InputBlockService();
        $inputBlockCommandController = new InputBlocksCommandController($inputBlockService);
        $inputBlockCommandController->explodeInputBlocks($blockInput);
    } catch (RuntimeException $exception) {
    }

    return;
}