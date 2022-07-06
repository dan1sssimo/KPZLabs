<?php
interface BridgeInterface
{
    public function method1();
    public function method2();
}

class Bridge1 implements BridgeInterface
{
    public function method1()
    {
        echo 'Bridge1 метод 1 <br>';
    }

    public function method2()
    {
        echo 'Bridge1 метод 2 <br>';
    }
}

class Bridge2 implements BridgeInterface
{
    public function method1()
    {
        echo 'Bridge2 метод 1 <br>';
    }

    public function method2()
    {
        echo 'Bridge2 метод 2<br>';
    }
}

abstract class AppAbstract
{
    protected $bridge;

    public function __construct(BridgeInterface $bridge)
    {
        $this->bridge = $bridge;
    }

    public function method1()
    {
        $this->bridge->method1();
    }

    public function method2()
    {
        $this->bridge->method2();
    }
}

class App extends AppAbstract
{
    public function run()
    {
        $this->method1();
        $this->method2();
    }
}


$a = new App(new Bridge1());
$a->run();
echo "<br>";
$b = new App(new Bridge2());
$b->run();
