<?php

namespace mvc\CLASSES;

class Cat extends Animal
{
    private string $name;

    public function getName(): string
    {
        return 'im a cat with ' . $this->name . ' name';
    }

    public function say($stringToSay): void
    {
        echo $stringToSay . ' meow';
    }

    public function feed($youWannaEat): bool
    {
        if ($youWannaEat) {
            echo 'thinner, cat!';
            return false;
        } else
            return true;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}