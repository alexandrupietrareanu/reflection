<?php

declare(strict_types=1);
use Reflection\Classes\Traits\NameTrait;

class NameTraitTest extends \PHPUnit\Framework\TestCase
{
    public mixed $nameTrait;
    public array $traitMethodsShort = [];

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->nameTrait = new ReflectionClass(NameTrait::class);
        parent::__construct($name, $data, $dataName);
    }

    public function getShortMethods(){
        $methods = $this->nameTrait->getMethods();
        foreach($methods as $method){
            $this->traitMethodsShort[] = substr($method->getName(), 0, 3);
        }
    }

    public function testIsTrait(): void
    {
        $this->assertTrue($this->nameTrait->isTrait());
    }

    public function testHasTwoMethods(): void
    {
        $this->assertGreaterThan(0, sizeof($this->nameTrait->getMethods()));
    }

    /**
     * @throws ReflectionException
     */
    public function testGetNameSetter(): void
    {
        $this->getShortMethods();
        $method = $this->nameTrait->getMethod("getName");
        $parameters = $method->getParameters();
        $this->assertContains("get", $this->traitMethodsShort);
        $this->assertTrue($this->nameTrait->hasMethod("getName"));
        $this->assertEquals(0, sizeof($parameters));
        $this->assertEquals('string', $method->getReturnType()->getName());
    }

    /**
     * @throws ReflectionException
     */
    public function testSetNameSetter(): void
    {
        $this->getShortMethods();
        $method = $this->nameTrait->getMethod("setName");
        $parameters = $method->getParameters();
        $this->assertContains("set", $this->traitMethodsShort);
        $this->assertTrue($this->nameTrait->hasMethod("setName"));
        $this->assertEquals(1, sizeof($parameters));
        $this->assertEquals('name', $parameters[0]->getName());
        $this->assertEquals('string', $parameters[0]->getType()->getName());
        $this->assertEquals('void', $method->getReturnType()->getName());
    }
}