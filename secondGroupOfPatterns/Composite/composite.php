<?php

interface CompositeInterface
{
    public function run();
}

class Composite implements CompositeInterface
{
    private $classes;

    public function addClass(CompositeInterface $class)
    {
        $this->classes[] = $class;
    }
    public function run()
    {
        foreach ($this->classes as $class) {
            $class->run();
        }
    }
}

class ClassOne implements CompositeInterface
{
    public function run()
    {
        echo 'Class1 запущений <br>';
    }
}

class ClassTwo implements CompositeInterface
{
    public function run()
    {
        echo "Class2 запущений <br>";
    }
}



$a = new Composite();

$a->addClass(new ClassOne());
$a->addClass(new ClassTwo());

$a->run();
