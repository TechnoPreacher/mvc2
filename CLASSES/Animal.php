<?php

namespace mvc\CLASSES;

abstract class Animal
{
    abstract public function getName(): string;

    abstract public function say(string $stringToSay): void;

    abstract public function feed(bool $youWannaEat): bool;
}