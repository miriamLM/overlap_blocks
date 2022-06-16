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
        $charOrientationCount = 0;

        //explode the inputBlocks to get the two blocks
        for ($i = 0; $i < strlen($explodeInputBlocksRequest->value()); $i++) {
            //while the second character is not found, it save the value in the firstBlock,
            // otherwhise save the values in the secondBlock
            if (false === $secondCharOrientation) {
                $firstBlock = $firstBlock . $explodeInputBlocksRequest->value()[$i];
            } else {
                $secondBlock = $secondBlock . $explodeInputBlocksRequest->value()[$i];
            }
            //if it is found the second character, subtract a value of the of the firstBlock (referring to the id)
            // and save the id and the character of the orientation in the secondBlock
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
            //control that only can be 2 char so it count the characters in the input
            if ($this->isChar($explodeInputBlocksRequest->value()[$i])) {
                $charOrientationCount++;
            }
        }

        if (false === $firstCharOrientation || false === $secondCharOrientation || 5 != strlen(
                $firstBlock
            ) || 5 != strlen($secondBlock)) {
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