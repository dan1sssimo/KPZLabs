<?php

abstract class AppEncoder
{
    abstract public function encode(): string;
}

class BloggsAppEncoder extends AppEncoder
{
    public function encode(): string
    {
        return "Дані про зустріч закодовані в форматі BloggsCal <br>";
    }
}
abstract class CommsManager
{
    abstract public function getHeaderText () : string;
    abstract public function getAppEncoder(): AppEncoder;
    abstract public function getFooterText(): string;
}
class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "BloggsCall верхній колонтитул <br>";
    }
    public function getAppEncoder(): AppEncoder
    {
        return new BloggsAppEncoder();
    }
    public function getFooterText(): string
    {
        return "BloggsCall нижній колонтитул <br>";
    }
}

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getAppEncoder()->encode();
print $mgr->getFooterText();
