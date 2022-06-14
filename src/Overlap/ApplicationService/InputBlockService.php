<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\ApplicationService;

final class InputBlockService
{

    public function explodeInputBlocks(ExplodeInputBlocksRequest $explodeInputBlocksRequest)
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
    }

    private function isChar(string $inputChar): bool
    {
        if (preg_match('/^[a-z]+$/i', $inputChar)) {
            return true;
        }
        return false;
    }
}