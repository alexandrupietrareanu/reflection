<?php

namespace Reflection\Classes;

use Reflection\Classes\Interfaces\NameInterface;
use Reflection\Classes\Interfaces\DescriptionInterface;
use Reflection\Classes\Traits\DescriptionTrait;
use Reflection\Classes\Traits\NameTrait;

class Ticket implements NameInterface, DescriptionInterface
{
    use NameTrait, DescriptionTrait;
}