<?php

declare (strict_types=1);

namespace App\Classes\Interfaces;

interface NameInterface
{
    public function getName(): ?string;
    public function setName(string $name): void;
}