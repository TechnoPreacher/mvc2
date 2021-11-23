<?php

namespace mvc\CLASSES;

class Cow extends Animal
{
    private string $name;

    public function getName(): string
    {
        return 'COW # ' . $this->name . ' MUUUU';
    }

    public function say($stringToSay): void
    {
        echo 'MUUU ' . $stringToSay . ' MUUU';
    }

    public function feed($youWannaEat): bool
    {
        if ($youWannaEat) {
            echo 'MORE, MORE';
            return false;
        } else
            echo 'I NEED MORE';
        return false;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}