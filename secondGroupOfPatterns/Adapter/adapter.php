<?php

class ClassA
{
    public function methodOne()
    {
        echo 'ClassA метод класу A<br>';
    }
}

class ClassB
{
    public function methodTwo()
    {
        echo 'ClassB  метод класу B<br>';
    }
}

interface AdapterInterface
{
    public function commonMethod();
}

class AdapterA implements AdapterInterface
{
    protected $class;
    public function __construct()
    {
        $this->class = new ClassA();
    }
    public function commonMethod()
    {
        return $this->class->methodONe();
    }
}
class AdapterB implements AdapterInterface
{
    protected $class;

    public function __construct()
    {
        $this->class = new ClassB();
    }

    public function commonMethod()
    {
        return $this->class->methodTwo();
    }
}

$adapter1 = new AdapterA();
$adapter2 = new AdapterB();

$adapter1->commonMethod();
$adapter2->commonMethod();