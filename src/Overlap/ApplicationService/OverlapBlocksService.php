<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;


final class OverlapBlocksService
{
    public function __invoke(InputBlocksResponse $inputBlocksResponse): bool
    {
        $firstBlock = $inputBlocksResponse->firstBlockValue();
        $secondBlock = $inputBlocksResponse->secondBlockValue();

        //check if they overlap or not, taking into account the orientation of each block
        for ($i = 0; $i < $firstBlock->lengthValue(); $i++) {
            for ($j = 0; $j < $secondBlock->lengthValue(); $j++) {
                if ('h' === $firstBlock->orientationValue() && 'h' === $secondBlock->orientationValue()) {
                    if (($firstBlock->positionXValue() + $i) === ($secondBlock->positionXValue(
                            ) + $j) && $firstBlock->positionYValue() === $secondBlock->positionYValue()) {
                        return true;
                    }
                }
                if ('v' === $firstBlock->orientationValue() && 'v' === $secondBlock->orientationValue()) {
                    if (($firstBlock->positionYValue() + $i) === ($secondBlock->positionYValue(
                            ) + $j) && $firstBlock->positionXValue() === $secondBlock->positionXValue()) {
                        return true;
                    }
                }
                if ('h' === $firstBlock->orientationValue() && 'v' === $secondBlock->orientationValue()) {
                    if (($firstBlock->positionXValue() + $i) === $secondBlock->positionXValue(
                        ) && $firstBlock->positionYValue() === ($secondBlock->positionYValue() + $j)) {
                        return true;
                    }
                }
                if ('v' === $firstBlock->orientationValue() && 'h' === $secondBlock->orientationValue()) {
                    if ($firstBlock->positionXValue() === ($secondBlock->positionXValue(
                            ) + $j) && ($firstBlock->positionYValue() + $i) === $secondBlock->positionYValue()) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}