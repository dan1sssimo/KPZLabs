<?php

abstract class ComponentAbstract
{
    abstract public function operation();
}

class Component extends ComponentAbstract
{
    public function operation()
    {
        echo 'Component operation <br>';
    }
}


abstract class DecoratorAbstract
{
    protected $component;

    public function __construct($component)
    {
        $this->component = $component;
    }
}

class Decorator extends DecoratorAbstract
{
    // додаємо новий  функціонал
    public function operation()
    {
        echo 'Decorator 1 <br>';
        $this->component->operation();
        echo 'Decorator 2 <br>';
    }
}

$decoratedComponent = new Decorator(new Component());

$decoratedComponent->operation();
