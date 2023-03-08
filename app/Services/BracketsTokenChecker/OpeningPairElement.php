<?php

namespace App\Services\BracketsTokenChecker;

class OpeningPairElement extends BasePairElement
{
    public function operateOnStack(array &$stack): void
    {
        $stack[] = $this->element;
    }
}
