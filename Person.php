<?php

interface Human
{
    public function setAge();

    public function getAge();

    public function seyHi();


}

//class Male extends Person implements Human
class Male implements Human
{
    public function getAge()
    {
    return $this->getAge();
    }


    public function setAge()
    {
        // TODO: Implement setAge() method.
    }

    public function seyHi()
    {
        // TODO: Implement seyHi() method.
    }

}






//namespace mvc;

//abstract class Person
//{
//    public $gender;
//    public $name = 'Vasya';
//    public $age;
//
//
//    public function __construct($name)
//    {
//        $this->name = $name;
//    }
//
//    public function setAge($age): void
//    {
//        $this->age = $age;
//    }
//}
//
//class Male extends Person
//{
//    public function __construct($name, $sex)
//    {
//        parent::__construct($name);// надо вызвать конструктор!
//        $this->gender = $sex;
//    }
//
//
//}
//
//class female extends Person
//{
//
//}
//
//
//
////$person = new Person('victor');
//var_dump($person->name);
//echo '</br>';
//$person->setAge(33);
//var_dump($person->age);
//
//$male = new Male('victor22', 'male3');
//var_dump($male->name);
//echo '</br>';
//var_dump($male->gender);