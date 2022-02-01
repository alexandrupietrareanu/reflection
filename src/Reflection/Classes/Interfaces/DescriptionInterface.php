<?php

declare (strict_types=1);

namespace Reflection\Classes\Interfaces;

interface DescriptionInterface
{
    public function getDescription(): ?string;
    public function setDescription(string $description): void;
}