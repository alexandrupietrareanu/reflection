<?php

declare(strict_types=1);
use Reflection\Classes\JiraTicket;

class JiraTicketTest extends \PHPUnit\Framework\TestCase
{
    public mixed $reflectionJiraTicket;
    public array $methodsShort = [];
    public const REFLECTION_CLASSES_PATH = "Reflection\Classes\\";
    public const TICKET_CLASS = "Ticket";
    public const JIRA_TICKET_CLASS = "JiraTicket";
    public const INTERFACES= "Interfaces";
    public const TRAITS = "Traits";

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->reflectionJiraTicket = new ReflectionClass(JiraTicket::class);
        parent::__construct($name, $data, $dataName);
    }

    public function getShortMethods(){
        $methods = $this->reflectionJiraTicket->getMethods();
        foreach($methods as $method){
            $this->methodsShort[] = substr($method->getName(), 0, 3);
        }
    }

    public function testIsClass(): void
    {
        $this->assertTrue(class_exists(self::REFLECTION_CLASSES_PATH.self::JIRA_TICKET_CLASS));
    }

    public function testIsChildOfTicket(): void
    {
        $this->assertEquals(self::REFLECTION_CLASSES_PATH.self::TICKET_CLASS, $this->reflectionJiraTicket->getParentClass()->getName());
    }


    /**
     * @throws ReflectionException
     */
    public function testGetPrioritySetter(): void
    {
        $this->getShortMethods();
        $method = $this->reflectionJiraTicket->getMethod("getPriority");
        $parameters = $method->getParameters();
        $this->assertContains("get", $this->methodsShort);
        $this->assertTrue($this->reflectionJiraTicket->hasMethod("getPriority"));
        $this->assertEquals(0, sizeof($parameters));
        $this->assertEquals('string', $method->getReturnType()->getName());
    }
    
    /**
     * @throws ReflectionException
     */
    public function testSetPrioritySetter(): void
    {
        $this->getShortMethods();
        $method = $this->reflectionJiraTicket->getMethod("setPriority");
        $parameters = $method->getParameters();
        $this->assertContains("set", $this->methodsShort);
        $this->assertTrue($this->reflectionJiraTicket->hasMethod("setPriority"));
        $this->assertEquals(1, sizeof($parameters));
        $this->assertEquals('priority', $parameters[0]->getName());
        $this->assertEquals('string', $parameters[0]->getType()->getName());
        $this->assertEquals('void', $method->getReturnType()->getName());
    }
}