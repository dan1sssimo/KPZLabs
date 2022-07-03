<?php

namespace RefactoringGuru\Visitor\Conceptual;

interface Component
{
    public function accept(Visitor $visitor);
}

//Кожен компонент реалізує метод accept
class ConcreteComponentA implements Component
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteComponentA($this);
    }
    public function exclusiveMethodOfConcreteComponentA(): string
    {
        return "A";
    }
}

class ConcreteComponentB implements Component
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteComponentB($this);
    }

    public function specialMethodOfConcreteComponentB(): string
    {
        return "B";
    }
}
// Інтерфейс набору методів відвідування
interface Visitor
{
    public function visitConcreteComponentA(ConcreteComponentA $element);
    public function visitConcreteComponentB(ConcreteComponentB $element);
}
// Виводим відвідувачів
class ConcreteVisitor1 implements Visitor
{
    public function visitConcreteComponentA(ConcreteComponentA $element)
    {
        echo $element->exclusiveMethodOfConcreteComponentA() . " + ConcreteVisitor1<br>";
    }

    public function visitConcreteComponentB(ConcreteComponentB $element)
    {
        echo $element->specialMethodOfConcreteComponentB() . " + ConcreteVisitor1<br>";
    }
}
// Виводим відвідувачів
class ConcreteVisitor2 implements Visitor
{
    public function visitConcreteComponentA(ConcreteComponentA $element)
    {
        echo $element->exclusiveMethodOfConcreteComponentA() . " + ConcreteVisitor2<br>";
    }

    public function visitConcreteComponentB(ConcreteComponentB $element)
    {
        echo $element->specialMethodOfConcreteComponentB() . " + ConcreteVisitor2<br>";
    }
}

// функція для
function clientCode(array $components, Visitor $visitor)
{
    foreach ($components as $component) {
        $component->accept($visitor);
    }
}

$components = [
    new ConcreteComponentA(),
    new ConcreteComponentB(),
];

echo "Код клієнта працює з усіма відвідувачами через базовий інтерфейс Visitor: <br>";
$visitor1 = new ConcreteVisitor1();
clientCode($components, $visitor1);
echo "<br>";

echo "Це дозволяє одному клієнтському коду працювати з різними типами відвідувачів: <br>";
$visitor2 = new ConcreteVisitor2();
clientCode($components, $visitor2);