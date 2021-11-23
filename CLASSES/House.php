<?php

namespace mvc\CLASSES;

class House implements Building
{
    private int $number = 0;
    private int $flats = 0;
    private int $floors = 0;

    public function setFlatNumber($num): void
    {
        $this->flats = $num;
    }

    public function setHomeNumber($num): void
    {
        $this->number = $num;
    }

    public function setStageNumber($num): void
    {
        $this->floors = $num;
    }

    public function getFlats(): int
    {
        return $this->flats;
    }

    public function getFloors(): int
    {
        return $this->floors;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

}