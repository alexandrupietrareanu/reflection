<?php

declare (strict_types=1);

namespace App\Classes\Interfaces;

interface DescriptionInterface
{
    public function getDescription(): ?string;
    public function setDescription(string $description): void;
}