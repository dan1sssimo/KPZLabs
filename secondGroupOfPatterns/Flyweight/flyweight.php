<?php

class ClassA1
{
    public function run()
    {
        echo 'ClassA run <br>';
    }
}

class ClassB2
{
    public function run()
    {
        echo 'ClassB run <br>';
    }
}

class ClassC3
{
    public function run()
    {
        echo 'ClassC run <br>';
    }
}

class FlyweightFactory
{
    private $allObj = [];

    public function getObj($key)
    {
        if (!isset($this->allObj[$key])) {
            switch ($key) {
                case 'A':
                    $this->allObj[$key] = new ClassA1();
                    break;
                case 'B':
                    $this->allObj[$key] = new ClassB2();
                    break;
                case 'C':
                    $this->allObj[$key] = new ClassC3();
                    break;
            }
        }
        return $this->allObj[$key];
    }
}

$factory = new FlyweightFactory();

$keys = ['A', 'B', 'C'];

foreach ($keys as $key) {
    $obj = $factory->getObj($key);
    $obj->run();
}
