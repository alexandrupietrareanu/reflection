<?php

declare(strict_types=1);

namespace Reflection\Classes\Traits;

trait NameTrait
{
    private ?string $name = null;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}