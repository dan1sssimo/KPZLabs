<?php
class RealClass
{
    public function operation1()
    {
        echo 'RealClass operation 1 <br>';
    }

    public function operation2()
    {
        echo 'RealClass operation 2 <br>';
    }
}

class ProxyClass
{
    protected $class;

    public function __construct()
    {
        $this->class = new RealClass();
    }

    //виконуємо першу операцію
    public function run1()
    {
        $this->class->operation1();
    }

    //виконуємо другу операцію
    public function run2()
    {
        $this->class->operation2();
    }
}

$p = new ProxyClass();

$p->run1();
$p->run2();
