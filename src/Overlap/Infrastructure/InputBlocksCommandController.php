<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Infrastructure;

use OverlapBlocks\Overlap\ApplicationService\ExplodeInputBlocksRequest;
use OverlapBlocks\Overlap\ApplicationService\InputBlockService;
use OverlapBlocks\Overlap\ApplicationService\InputBlocksResponse;
use OverlapBlocks\Overlap\ApplicationService\OverlapBlocksService;

final class InputBlocksCommandController
{
    private InputBlockService $inputBlockService;
    private OverlapBlocksService $overlapBlocksService;

    public function __construct(InputBlockService $inputBlockService, OverlapBlocksService $overlapBlocksService)
    {
        $this->inputBlockService = $inputBlockService;
        $this->overlapBlocksService = $overlapBlocksService;
    }

    public function explodeInputBlocks(string $inputBlocks): bool
    {
        $explodeInputBlocksRequest = new ExplodeInputBlocksRequest($inputBlocks);
        $inputBlocksResponse = $this->inputBlockService->explodeInputBlocks($explodeInputBlocksRequest);
        return $this->overlapBlocks($inputBlocksResponse);
    }

    public function overlapBlocks(InputBlocksResponse $inputBlocksResponse): bool
    {
        return $this->overlapBlocksService->__invoke($inputBlocksResponse);
    }
}