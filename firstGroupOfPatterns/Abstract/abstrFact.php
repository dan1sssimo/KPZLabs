<?php

interface FactoryInterface
{
    public function method();
}


class BetonFactoryA implements FactoryInterface
{
    protected $class;
    public function __construct()
    {
        $this->class = new Class1();
    }

    public function method()
    {
        $this->class->method();
    }
}


class BetonFactoryB implements FactoryInterface
{
    protected $class;
    public function __construct()
    {
        $this->class = new Class2();
    }
    public function method()
    {
        $this->class->method();
    }
}

class Class1
{
    public function method()
    {
        echo 'Class1 method<br>';
    }
}

class Class2
{
    public function method()
    {
        echo 'Class2 method<br>';
    }
}

$a = new BetonFactoryA();
$a->method();

$b = new BetonFactoryB();
$b->method();
