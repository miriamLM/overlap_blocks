<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;


use OverlapBlocks\Overlap\Domain\Block;
use OverlapBlocks\Overlap\Domain\Exceptions\InvalidInputs;

final class InputBlockService
{

    public function explodeInputBlocks(ExplodeInputBlocksRequest $explodeInputBlocksRequest): InputBlocksResponse
    {
        $inputBlocks = explode(" ", $explodeInputBlocksRequest->value());
        $characters = 0;
        for ($i = 0; $i < count($inputBlocks); $i++) {
            if ($this->isChar($inputBlocks[$i])) {
                $characters++;
            }
        }
        if (2 != $characters || 10 != count($inputBlocks)){
            throw new InvalidInputs();
        }

        $blocks = array_chunk($inputBlocks, 5);


        $firstBlockCreated = $this->createBlock($blocks[0]);

        $secondBlockCreated = $this->createBlock($blocks[1]);

        return new InputBlocksResponse($firstBlockCreated, $secondBlockCreated);

    }

    private function isChar(string $inputChar): bool
    {
        if (preg_match('/^[a-z]+$/i', $inputChar)) {
            return true;
        }
        return false;
    }

    private function createBlock(array $block): Block
    {
        $id = $block[0];
        $orientation = $block[1];
        $positionX = $block[2];
        $positionY = $block[3];
        $length = $block[4];

        return new Block(intval($id), $orientation, intval($positionX), intval($positionY), intval($length));
    }
}