<?php

namespace Reflection\Classes;

use App\Classes\Interfaces\DescriptionInterface;
use App\Classes\Interfaces\NameInterface;
use App\Classes\Traits\DescriptionTrait;
use App\Classes\Traits\NameTrait;

class Ticket implements NameInterface, DescriptionInterface
{
    use NameTrait, DescriptionTrait;

    public function __construct(string $name, string $description)
    {
        $this->setName($name);
        $this->setDescription($description);
    }
}