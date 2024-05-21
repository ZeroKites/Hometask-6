<?php

trait Special_thinking
{
    public function Thinka()
    {
        echo "\nI`m bomj: ";
    }
}

interface Puser
{
    public function Thinking();
}

abstract class GeneralObject
{
    public string $name;
    public bool $alive;

    public function __construct(string $name, bool $alive)
    {
        $this->name = $name;
        $this->alive = $alive;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static $Universe = "Earth";

    public static function staticMethod()
    {
        echo "Universe: " . self::$Universe . "\n";
    }

    public function getLife(): string
    {
        return $this->alive ? 'alive' : 'dead';
    }
}

class Bus extends GeneralObject
{
    protected int $special_number;

    public function __construct(string $name, bool $alive, int $special_number)
    {
        parent::__construct($name, $alive);
        $this->special_number = $special_number;
        echo "\nI`m going home. " . $name;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    public function getSpecial(): int
    {
        return $this->special_number;
    }

    public function __destruct()
    {
        echo "\nBus Passed: " . $this->name;
    }
}

final class Passenger extends GeneralObject implements Puser
{
    use Special_thinking;

    private string $passport_number;
    protected string $profession;

    public function __construct(string $name, bool $alive, string $passport_number, string $profession)
    {
        parent::__construct($name, $alive);
        $this->passport_number = $passport_number;
        $this->profession = $profession;
        echo "\nI`m a new passenger" . $name;
    }

    public function Thinking(): void
    {
        echo "\nDodik";
    }

    public function __destruct()
    {
        echo "\nPassenger Leaved: " . $this->name;
    }
}

final class Busstop extends Bus
{
    protected string $place;

    public function __construct(string $name, bool $alive, int $special_number, string $place)
    {
        parent::__construct($name, $alive, $special_number);
        $this->place = $place;
        echo "\nI`m a new busstop " . $name;
    }

    final public function getSpecial(): int
    {
        return $this->special_number;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function __call($name, $arguments)
    {
        if ($name === 'overloadedMethod') {
            echo "\nGood";
        }
    }

    public function __destruct()
    {
        echo "\nBusstop destroyed: " . $this->name;
    }
}

// Приклад використання
$Bigbus = new Bus("Bigbus", false, 345);
$Marshrutka = new Bus("Marshrutka", false, 123);
$Tralik = new Bus("Tralik", false, 678);
$Student = new Passenger("Biba", true, "123456", "");
$Babushka = new Passenger("Boba", true, "654321", "");
$Programist = new Passenger("Babka", true, "678901", "Programist");
$Konechka = new Busstop("Konechka", false, 567, "pochitas");
$SimpleStop = new Busstop("SimpleStop", false, 7, "freetas");

$Programist->Thinka();
$Babushka->Thinking();
$Konechka->overloadedMethod('argument1');

