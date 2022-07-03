<?php
class MyClass
{
    public function method()
    {
        echo 'MyClass method <br>';
    }
}
$my = new MyClass();
$clone = clone $my;
$clone->method();
echo "Перевірка:<br>";
unset($my);
$clone->method();