<?php

class Observable implements \SplSubject
{
    private $observers;

    function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    function notify()
    {
        foreach ($this->observers as $obj) {
            $obj->update($this);
        }
    }
}

class Observer1 implements \SplObserver
{
    function update(SplSubject $subject)
    {
        echo 'update Observer1<br>';
    }
}

class Observer2 implements \SplObserver
{
    function update(SplSubject $subject)
    {
        echo 'update Observer2<br>';
    }
}


$observable = new Observable();
$o1 = new Observer1();
$o2 = new Observer2();

$observable->attach($o1);
$observable->attach($o2);

$observable->notify();

$observable->detach($o1);

$observable->notify();
