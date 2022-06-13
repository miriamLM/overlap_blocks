<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Infrastructure;

final class InputBlocksCommandController
{
    public function __construct()
    {
    }

    public function explodeInputBlocks(string $inputBlocks): void
    {
        //echo "$inputBlocks";
        $firstBlock = "";
    //todo esto al aplication service
        for ($i = 0; $i < strlen($inputBlocks); $i++) {

            $firstBlock = $firstBlock . $inputBlocks[$i];
        }
        echo "$firstBlock";
    }
}