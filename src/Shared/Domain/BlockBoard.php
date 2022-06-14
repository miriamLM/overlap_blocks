<?php

declare(strict_types=1);

final class BlockBoard
{
    private int $width;
    private int $length;

    public function __construct(int $width, int $length)
    {
        $this->width = $width;
        $this->length = $length;
    }

    public function widthValue(): int
    {
        return $this->width;
    }


    public function lenghtValue(): int
    {
        return $this->length;
    }

}