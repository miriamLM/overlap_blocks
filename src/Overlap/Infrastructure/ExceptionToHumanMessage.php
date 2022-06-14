<?php


namespace OverlapBlocks\Overlap\Infrastructure;


use OverlapBlocks\Overlap\Domain\Exceptions\InvalidInputs;

final class ExceptionToHumanMessage
{
    private array $exceptionToHumanMessage = [
        InvalidInputs::class => 'Invalid inputs'
    ];

    public function map(string $exceptionClass): string
    {
        if (!array_key_exists($exceptionClass, $this->exceptionToHumanMessage)) {
            return 'Unknown error';
        }
        return $this->exceptionToHumanMessage[$exceptionClass];
    }

}