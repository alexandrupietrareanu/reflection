<?php

declare(strict_types=1);

namespace Reflection\Classes\Traits;

trait DescriptionTrait
{
    private ?string $description = null;

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}