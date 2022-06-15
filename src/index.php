<?php

declare(strict_types=1);

use OverlapBlocks\Overlap\ApplicationService\InputBlockService;
use OverlapBlocks\Overlap\ApplicationService\OverlapBlocksService;
use OverlapBlocks\Overlap\Infrastructure\ExceptionToHumanMessage;
use OverlapBlocks\Overlap\Infrastructure\InputBlocksCommandController;


require_once '../vendor/autoload.php';

if (isset($argv)) {
    try {
        $blockInput = count($argv) === 1 ? "" : $argv[1];

        $inputBlockService = new InputBlockService();
        $overlapBlocksService = new OverlapBlocksService();
        $inputBlockCommandController = new InputBlocksCommandController($inputBlockService, $overlapBlocksService);
        $overlap = $inputBlockCommandController->explodeInputBlocks($blockInput);
        echo $overlap ? 'true' : 'false';
        echo "\n";
    } catch (RuntimeException $exception) {
        $exceptionToHumanMessage = new ExceptionToHumanMessage();
        echo $exceptionToHumanMessage->map(get_class($exception)) . '. Error code: ' . $exception->getCode(
            ) . '.' . "\n";
    }

    return;
}