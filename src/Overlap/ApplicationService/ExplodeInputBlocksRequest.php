<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;

final class ExplodeInputBlocksRequest
{
    private string $inputBlocks;

    public function __construct(string $inputBlocks)
    {
        $this->inputBlocks = $inputBlocks;
    }

    public function value(): string
    {
        return $this->inputBlocks;
    }
}