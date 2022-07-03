<?php

abstract class AlgorithmAbstract
{
    abstract function step1();

    abstract function step2();

    function baseOperation()
    {
        echo 'Абстрактний алгоритм<br>';
    }

    function hook()
    {

    }

    function run()
    {
        $this->step1();
        $this->step2();
        $this->baseOperation();
        $this->hook();
    }
}


class BaseClass1 extends AlgorithmAbstract
{
    function step1()
    {
        echo 'Class1 step1<br>';
    }

    function step2()
    {
        echo 'Class1 step2<br>';
    }
}

class BaseClass2 extends AlgorithmAbstract
{
    function step1()
    {
        echo 'Class2 step1<br>';
    }

    function step2()
    {
        echo 'Class2 step2<br>';
    }

    function hook()
    {
        echo 'Class2 hook<br>';
    }

    function baseOperation()
    {
        echo 'Class2 baseOperation<br>';
    }
}

class BaseClass3 extends BaseClass2
{
    // замінюємо метод в класі 2
    function step2()
    {
        echo 'Class3 step2<br>';
    }
}


$a = new BaseClass1();
$a->run();
echo "<br>";
$b = new BaseClass2();
$b->run();
echo "<br>";
$c = new BaseClass3();
$c->run();
