<?php

class Unit1
{
    public function run()
    {
        echo 'Собака біжить <br>';
    }
}

class Unit2
{
    public function show()
    {
        echo 'Собака дивиться <br>';
    }
}

class Unit3
{
    public function out()
    {
        echo 'Собака втікла<br>';
    }
}

class Facade
{
    protected $unit1;
    protected $unit2;
    protected $unit3;

    public function __construct()
    {
        $this->unit1 = new Unit1();
        $this->unit2 = new Unit2();
        $this->unit3 = new Unit3();
    }

    public function start()
    {
        $this->unit1->run();
        $this->unit2->show();
        $this->unit3->out();
    }
}

$f = new Facade();
$f->start();
