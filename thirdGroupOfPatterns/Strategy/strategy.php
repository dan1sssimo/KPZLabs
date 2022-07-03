<?php

interface Strategy
{
    public function execute();
}

class StrategyA implements Strategy
{
    public function execute()
    {
        echo 'StrategyA execute<br>';
    }
}

class StrategyB implements Strategy
{
    public function execute()
    {
        echo 'StrategyB execute<br>';
    }
}


class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function execute()
    {
        $this->strategy->execute();
    }
}

$context = new Context(new StrategyA()); // first strategy
$context->execute();
$context = new Context(new StrategyB()); // other strategy
$context->execute();
