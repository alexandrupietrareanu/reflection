<?php

declare(strict_types=1);
use Reflection\Classes\Traits\DescriptionTrait;

class DescriptionTraitTest extends \PHPUnit\Framework\TestCase
{
    public mixed $descriptionTrait;
    public array $traitMethodsShort = [];

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->descriptionTrait = new ReflectionClass(DescriptionTrait::class);
        parent::__construct($name, $data, $dataName);
    }

    public function getShortMethods(){
        $methods = $this->descriptionTrait->getMethods();
        foreach($methods as $method){
            $this->traitMethodsShort[] = substr($method->getName(), 0, 3);
        }
    }

    public function testIsTrait(): void
    {
        $this->assertTrue($this->descriptionTrait->isTrait());
    }

    public function testHasTwoMethods(): void
    {
        $this->assertGreaterThan(0, sizeof($this->descriptionTrait->getMethods()));
    }

    /**
     * @throws ReflectionException
     */
    public function testGetDescriptionSetter(): void
    {
        $this->getShortMethods();
        $method = $this->descriptionTrait->getMethod("getDescription");
        $parameters = $method->getParameters();
        $this->assertContains("get", $this->traitMethodsShort);
        $this->assertTrue($this->descriptionTrait->hasMethod("getDescription"));
        $this->assertEquals(0, sizeof($parameters));
        $this->assertEquals('string', $method->getReturnType()->getName());
    }

    /**
     * @throws ReflectionException
     */
    public function testSetDescriptionSetter(): void
    {
        $this->getShortMethods();
        $method = $this->descriptionTrait->getMethod("setDescription");
        $parameters = $method->getParameters();
        $this->assertContains("set", $this->traitMethodsShort);
        $this->assertTrue($this->descriptionTrait->hasMethod("setDescription"));
        $this->assertEquals(1, sizeof($parameters));
        $this->assertEquals('description', $parameters[0]->getName());
        $this->assertEquals('string', $parameters[0]->getType()->getName());
        $this->assertEquals('void', $method->getReturnType()->getName());
    }
}