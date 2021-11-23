<?php

namespace mvc\CLASSES;

interface Building
{
    public function setHomeNumber($num): void;//устанвка номера дома

    public function setFlatNumber($num): void;//установка числа квартир

    public function setStageNumber($num): void;//установка числа этажей
}