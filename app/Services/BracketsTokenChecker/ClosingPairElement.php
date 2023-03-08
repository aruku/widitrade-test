<?php

namespace App\Services\BracketsTokenChecker;

class ClosingPairElement extends BasePairElement
{
    public function isElementValid(string $otherElement): bool
    {
        return self::$pairs[$this->element] === $otherElement;
    }

    public function operateOnStack(array &$stack): void
    {
        array_pop($stack);
    }
}
