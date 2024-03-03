<?php 

class Person{
    private string $name ;
    private int $age ;
    private int $height ;
    private string $grade ;


    public function __construct(){
        echo "hay from Person\n";
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->age = $age;
    }

    public function getHeight(){
        return $this->height;
    }
    public function setHeight($height){
        $this->height = $height;
    }

    public function getGrade(){
        return $this->grade;
    }
    public function setGrade($grade){
        $this->grade = $grade;
    }

    public function eat(): void {
        echo "I'm eating now ";
    }

    public function sayHello() : void{
        echo "\nHello!";
    }
}