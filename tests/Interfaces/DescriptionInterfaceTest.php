<?php

declare(strict_types=1);
use Reflection\Classes\Interfaces\DescriptionInterface;

class DescriptionInterfaceTest extends \PHPUnit\Framework\TestCase
{
    public mixed $descriptionInterface;
    public array $interfaceMethodsShort = [];

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->descriptionInterface = new ReflectionClass(DescriptionInterface::class);
        parent::__construct($name, $data, $dataName);
    }

    public function getShortMethods(){
        $methods = $this->descriptionInterface->getMethods();
        foreach($methods as $method){
            $this->interfaceMethodsShort[] = substr($method->getName(), 0, 3);
        }
    }

    public function testIsInterface(): void
    {
        $this->assertTrue($this->descriptionInterface->isInterface());
    }

    public function testHasTwoMethods(): void
    {
        $this->assertGreaterThan(0, sizeof($this->descriptionInterface->getMethods()));
    }

    /**
     * @throws ReflectionException
     */
    public function testGetDescriptionSetter(): void
    {
        $this->getShortMethods();
        $method = $this->descriptionInterface->getMethod("getDescription");
        $parameters = $method->getParameters();
        $this->assertContains("get", $this->interfaceMethodsShort);
        $this->assertTrue($this->descriptionInterface->hasMethod("getDescription"));
        $this->assertEquals(0, sizeof($parameters));
        $this->assertEquals('string', $method->getReturnType()->getName());
    }

    /**
     * @throws ReflectionException
     */
    public function testSetDescriptionSetter(): void
    {
        $this->getShortMethods();
        $method = $this->descriptionInterface->getMethod("setDescription");
        $parameters = $method->getParameters();
        $this->assertContains("set", $this->interfaceMethodsShort);
        $this->assertTrue($this->descriptionInterface->hasMethod("setDescription"));
        $this->assertEquals(1, sizeof($parameters));
        $this->assertEquals('description', $parameters[0]->getName());
        $this->assertEquals('string', $parameters[0]->getType()->getName());
        $this->assertEquals('void', $method->getReturnType()->getName());
    }
}