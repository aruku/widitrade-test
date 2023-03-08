<?php

namespace App\Services\BracketsTokenChecker\Interfaces;

interface PairElement
{
    public function __construct(string $element);

    public function isElementValid(string $otherElement): bool;

    public function operateOnStack(array &$stack): void;
}
