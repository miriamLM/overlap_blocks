<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;


use OverlapBlocks\Overlap\Domain\Block;
use OverlapBlocks\Overlap\Domain\Exceptions\InvalidInputs;

final class InputBlockService
{

    public function explodeInputBlocks(ExplodeInputBlocksRequest $explodeInputBlocksRequest): InputBlocksResponse
    {
        $firstBlock = "";
        $secondBlock = "";

        $firstCharOrientation = false;
        $secondCharOrientation = false;

        for ($i = 0; $i < strlen($explodeInputBlocksRequest->value()); $i++) {
            if (false === $secondCharOrientation) {
                $firstBlock = $firstBlock . $explodeInputBlocksRequest->value()[$i];
            } else {
                $secondBlock = $secondBlock . $explodeInputBlocksRequest->value()[$i];
            }

            if ($this->isChar(
                    $explodeInputBlocksRequest->value()[$i]
                ) && true === $firstCharOrientation && false === $secondCharOrientation) {
                $secondCharOrientation = true;

                $secondBlock = $secondBlock . $explodeInputBlocksRequest->value()[$i - 1];
                $secondBlock = $secondBlock . $explodeInputBlocksRequest->value()[$i];

                $firstBlock = substr($firstBlock, 0, -2);
            }

            if ($this->isChar($explodeInputBlocksRequest->value()[$i]) && false === $firstCharOrientation) {
                $firstCharOrientation = true;
            }
        }
        if (false === $firstCharOrientation || false === $secondCharOrientation || 4 > strlen(
                $firstBlock
            ) || 4 > strlen($secondBlock)) {
            throw new InvalidInputs();
        }

        $firstBlockCreated = $this->createBlock($firstBlock);

        $secondBlockCreated = $this->createBlock($secondBlock);

        return new InputBlocksResponse($firstBlockCreated, $secondBlockCreated);
    }

    private function isChar(string $inputChar): bool
    {
        if (preg_match('/^[a-z]+$/i', $inputChar)) {
            return true;
        }
        return false;
    }

    private function createBlock(string $block): Block
    {
        $id = $block[0];
        $orientation = $block[1];
        $positionX = $block[2];
        $positionY = $block[3];
        $length = $block[4];

        return new Block(intval($id), $orientation, intval($positionX), intval($positionY), intval($length));
    }
}