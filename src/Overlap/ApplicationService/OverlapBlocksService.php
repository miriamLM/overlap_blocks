<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;


final class OverlapBlocksService
{
    public function __invoke(InputBlocksResponse $inputBlocksResponse)
    {
        var_dump($inputBlocksResponse);
    }
}