<?php

declare(strict_types=1);

use OverlapBlocks\Overlap\ApplicationService\InputBlockService;
use OverlapBlocks\Overlap\ApplicationService\OverlapBlocksService;
use OverlapBlocks\Overlap\Infrastructure\ExceptionToHumanMessage;
use OverlapBlocks\Overlap\Infrastructure\InputBlocksCommandController;


require_once '../vendor/autoload.php';


try {
    $inputBlocks = json_decode(file_get_contents('../coordinate.json'));

    for ($i = 0; $i < count($inputBlocks); $i++) {
        $inputBlockService = new InputBlockService();
        $overlapBlocksService = new OverlapBlocksService();
        $inputBlockCommandController = new InputBlocksCommandController($inputBlockService, $overlapBlocksService);
        $overlap = $inputBlockCommandController->explodeInputBlocks($inputBlocks[$i]);
        echo "$inputBlocks[$i] : ";
        echo $overlap ? 'true' : 'false';
        echo "\n";
    }
} catch (RuntimeException $exception) {
    $exceptionToHumanMessage = new ExceptionToHumanMessage();
    echo $exceptionToHumanMessage->map(get_class($exception)) . '. Error code: ' . $exception->getCode() . '.' . "\n";
}

return;
