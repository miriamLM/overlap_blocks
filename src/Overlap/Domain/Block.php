<?php

declare(strict_types=1);

namespace OverlapBlocks\Overlap\Domain;


use OverlapBlocks\Overlap\Domain\Exceptions\InvalidInputs;

final class Block
{
    private int $id;
    private string $orientation;
    private int $positionX;
    private int $positionY;
    private int $length;

    public function __construct(int $id, string $orientation, int $positionX, int $positionY, int $length)
    {
        $this->id = $id;
        $this->orientation = $orientation;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->length = $length;

        $this->checkCorrectOrientation();
    }

    public function idValue(): int
    {
        return $this->id;
    }

    public function orientationValue(): string
    {
        return $this->orientation;
    }

    public function positionXValue(): int
    {
        return $this->positionX;
    }

    public function positionYValue(): int
    {
        return $this->positionY;
    }

    public function lengthValue(): int
    {
        return $this->length;
    }

    public function checkCorrectOrientation()
    {
        if ('v' != $this->orientationValue() || 'h' != $this->orientationValue())
        {
            throw new InvalidInputs();
        }
    }

}