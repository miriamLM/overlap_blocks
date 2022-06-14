<?php

declare(strict_types=1);

final class Block
{
    private int $id;
    private string $orientation;
    private int $positionX;
    private int $positionY;
    private int $lenght;

    public function __construct(int $id, string $orientation, int $positionX, int $positionY, int $lenght)
    {
        $this->id = $id;
        $this->orientation = $orientation;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->lenght = $lenght;
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

    public function lenghtValue(): int
    {
        return $this->lenght;
    }

    public function checkCorrectOrientation()
    {

    }

}