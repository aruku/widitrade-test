<?php

namespace App\Services\BracketsTokenChecker;

use App\Services\BracketsTokenChecker\Interfaces\PairElement;

abstract class BasePairElement implements PairElement
{
    protected static array $pairs = [
        ')' => '(',
        ']' => '[',
        '}' => '{',
    ];

    public function __construct(protected string $element) {}

    public function isElementValid(string $otherElement): bool
    {
        return true;
    }
}
