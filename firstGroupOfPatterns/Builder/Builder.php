<?php

class Product
{
    private $list;

    public function add($elem)
    {
        $this->list[] = $elem;
    }

    public function getProduct()
    {
        foreach ($this->list as $el) {
            echo $el . '<br>';
        }
    }
}
class Director
{
    public function setConstruct($builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}

abstract class BuilderAbstract
{
    public function buildPartA()
    {
    }

    public function buildPartB()
    {
    }

    abstract public function getResult();
}

class BetonBuilder1 extends BuilderAbstract
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('Builder First Part A');
    }

    public function buildPartB()
    {
        $this->product->add('Builder First Part B');
    }

    public function getResult()
    {
        return $this->product;
    }
}

class BetonBuilder2 extends BuilderAbstract
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('Builder Second Part A');
    }

    public function buildPartB()
    {
        $this->product->add('Builder Second Part B');
    }

    public function getResult()
    {
        return $this->product;
    }
}
$director = new Director();
$builder1 = new BetonBuilder1();
$builder2 = new BetonBuilder2();
$director->setConstruct($builder1);
$product1 = $builder1->getResult();
$product1->getProduct();
$director->setConstruct($builder2);
$product2 = $builder2->getResult();
$product2->getProduct();