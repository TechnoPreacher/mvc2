<?php


namespace mvc\CLASSES;

class Dog extends Animal
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function say($stringToSay): void
    {
        echo $stringToSay;
    }

    public function feed($youWannaEat): bool
    {
        if ($youWannaEat) {
            echo 'it this!';
        }
        return true;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
