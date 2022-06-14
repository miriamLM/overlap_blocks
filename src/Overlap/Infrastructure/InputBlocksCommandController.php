<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Infrastructure;

use OverlapBlocks\Overlap\ApplicationService\ExplodeInputBlocksRequest;
use OverlapBlocks\Overlap\ApplicationService\InputBlockService;

final class InputBlocksCommandController
{
    private InputBlockService $inputBlockService;

    public function __construct(InputBlockService $inputBlockService)
    {
        $this->inputBlockService = $inputBlockService;
    }

    public function explodeInputBlocks(string $inputBlocks): void
    {
        $explodeInputBlocksRequest = new ExplodeInputBlocksRequest($inputBlocks);
        $this->inputBlockService->explodeInputBlocks($explodeInputBlocksRequest);

    }
}