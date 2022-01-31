<?php

declare (strict_types=1);

namespace Reflection\Classes\Interfaces;

interface NameInterface
{
    public function getName(): ?string;
    public function setName(string $name): void;
}