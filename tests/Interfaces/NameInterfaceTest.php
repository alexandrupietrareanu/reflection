<?php

declare(strict_types=1);
use Reflection\Classes\Interfaces\NameInterface;

class NameInterfaceTest extends \PHPUnit\Framework\TestCase
{
    public mixed $nameInterface;
    public array $interfaceMethodsShort = [];

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->nameInterface = new ReflectionClass(NameInterface::class);
        parent::__construct($name, $data, $dataName);
    }

    public function getShortMethods(){
        $methods = $this->nameInterface->getMethods();
        foreach($methods as $method){
            $this->interfaceMethodsShort[] = substr($method->getName(), 0, 3);
        }
    }

    public function testIsInterface(): void
    {
        $this->assertTrue($this->nameInterface->isInterface());
    }

    public function testHasTwoMethods(): void
    {
        $this->assertGreaterThan(0, sizeof($this->nameInterface->getMethods()));
    }

    /**
     * @throws ReflectionException
     */
    public function testGetNameSetter(): void
    {
        $this->getShortMethods();
        $method = $this->nameInterface->getMethod("getName");
        $parameters = $method->getParameters();
        $this->assertContains("get", $this->interfaceMethodsShort);
        $this->assertTrue($this->nameInterface->hasMethod("getName"));
        $this->assertEquals(0, sizeof($parameters));
        $this->assertEquals('string', $method->getReturnType()->getName());
    }

    /**
     * @throws ReflectionException
     */
    public function testSetNameSetter(): void
    {
        $this->getShortMethods();
        $method = $this->nameInterface->getMethod("setName");
        $parameters = $method->getParameters();
        $this->assertContains("set", $this->interfaceMethodsShort);
        $this->assertTrue($this->nameInterface->hasMethod("setName"));
        $this->assertEquals(1, sizeof($parameters));
        $this->assertEquals('name', $parameters[0]->getName());
        $this->assertEquals('string', $parameters[0]->getType()->getName());
        $this->assertEquals('void', $method->getReturnType()->getName());
    }
}