<?php

declare(strict_types=1);

use OverlapBlocks\Overlap\Infrastructure\InputBlocksCommandController;

require_once '../vendor/autoload.php';

if (isset($argv)) {
    try {
        $blockInput = count($argv) === 1 ? "" : $argv[1];
        //echo "$blockInput";
        $inputBlockCommandController = new InputBlocksCommandController();
        $inputBlockCommandController->explodeInputBlocks($blockInput);
    } catch (RuntimeException $exception) {
    }

    return;
}