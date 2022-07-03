<?php

namespace RefactoringGuru\Command\Conceptual;

interface Command
{
    public function execute();
}

class SimpleCommand implements Command
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function execute()
    {
        echo "Команда для написання тексту: текст:(" . $this->payload . ")<br>";
    }
}

class ComplexCommand implements Command
{
    private $receiver;
    private $a;
    private $b;
    public function __construct(Receiver $receiver, string $a, string $b)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }
    public function execute()
    {
        echo "Комплексна команда: складні функції може виконувати об'єкт-приймач<br>";
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
    }
}

class Receiver
{
    public function doSomething(string $a)
    {
        echo "Отримувач: Працює на (" . $a . ".)<br>";
    }

    public function doSomethingElse(string $b)
    {
        echo "Отримувач: Також, працює на (" . $b . ".)<br>";
    }
}

// надсилання запиту до команди
class Sender
{
    private $onStart;
    private $onFinish;
    public function setOnStart(Command $command)
    {
        $this->onStart = $command;
    }
    public function setOnFinish(Command $command)
    {
        $this->onFinish = $command;
    }

    //Inv передає запит отримувачу, виконуючи команди
    public function doSomethingImportant()
    {
        echo "Sender: Щось повинно бути зробленим, до старту?<br>";
        if ($this->onStart instanceof Command) {
            $this->onStart->execute();
        }

        echo "Sender: виконування команди.<br>";

        echo "Sender: Щось повинно бути зробленим, до старту?<br>";
        if ($this->onFinish instanceof Command) {
            $this->onFinish->execute();
        }
    }
}

$invoker = new Sender();
$invoker->setOnStart(new SimpleCommand("Скажи привіт"));
$receiver = new Receiver();
$invoker->setOnFinish(new ComplexCommand($receiver, "Відправ смайлик", "Збережи помилки"));
$invoker->doSomethingImportant();