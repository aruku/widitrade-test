<?php

namespace App\Services\Interfaces;

interface TokenChecker
{
    public function __construct(string $token);

    public function isValid(): bool;
}
