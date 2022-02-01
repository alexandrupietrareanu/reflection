<?php

declare(strict_types=1);
use Reflection\Classes\Ticket;

class TicketTest extends \PHPUnit\Framework\TestCase
{
    public mixed $reflectionTicket;
    public const REFLECTION_CLASSES_PATH = "Reflection\Classes\\";
    public const TICKET_CLASS = "Ticket";
    public const INTERFACES= "Interfaces";
    public const TRAITS = "Traits";

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->reflectionTicket = new ReflectionClass(Ticket::class);
        parent::__construct($name, $data, $dataName);
    }

    public function testIsClass(): void
    {
        $this->assertTrue(class_exists(self::REFLECTION_CLASSES_PATH.self::TICKET_CLASS));
    }

    public function testHasInterfaces(): void
    {
        $this->assertGreaterThan(0, sizeof($this->reflectionTicket->getInterfaces()));
        $this->assertContains(self::REFLECTION_CLASSES_PATH.self::INTERFACES. "\\". "NameInterface", $this->reflectionTicket->getInterfaceNames());
        $this->assertContains(self::REFLECTION_CLASSES_PATH.self::INTERFACES. "\\". "DescriptionInterface", $this->reflectionTicket->getInterfaceNames());
    }

    public function testHasTraits(): void
    {
        $this->assertGreaterThan(0, sizeof($this->reflectionTicket->getTraits()));
        $this->assertContains(self::REFLECTION_CLASSES_PATH.self::TRAITS. "\\"."NameTrait", $this->reflectionTicket->getTraitNames());
        $this->assertContains(self::REFLECTION_CLASSES_PATH.self::TRAITS. "\\"."DescriptionTrait", $this->reflectionTicket->getTraitNames());
    }
}