<?php

namespace App\Services;

use App\Services\BracketsTokenChecker\BasePairElement;
use App\Services\BracketsTokenChecker\ClosingPairElement;
use App\Services\BracketsTokenChecker\OpeningPairElement;
use App\Services\Interfaces\TokenChecker;

class BracketsTokenChecker implements TokenChecker
{
    public function __construct(private readonly string $token) {}

    private array $stack = [];

    private const classes = [
        '{' => OpeningPairElement::class,
        '[' => OpeningPairElement::class,
        '(' => OpeningPairElement::class,
        ')' => ClosingPairElement::class,
        ']' => ClosingPairElement::class,
        '}' => ClosingPairElement::class,
    ];

    public function isValid(): bool
    {
        if (preg_match("~[^()\[\]{}]+~", $this->token)) {
            return false;
        }

        foreach (str_split($this->token) as $char) {
            $class = self::classes[$char];
            /** @var BasePairElement $class */
            $element = new $class($char);
            if (empty($this->stack)
                || $element->isElementValid($this->stack[array_key_last($this->stack)])
            ) {
                $element->operateOnStack($this->stack);
            } else {
                return false;
            }
        }

        if (empty($this->stack)) {
            return true;
        }

        return false;
    }
}
