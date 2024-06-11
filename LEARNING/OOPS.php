<?php


class Player{

    //Access Modifiers
        /* 1.Public
           2. Private
           3.Protected */
    public $name;
    public $speed=1;

    function set_name($name){
        $this->name=$name;
    }

    function get_name(){
        return $this->name;
    }

    // //constructor
    // function __construct(){
    //     echo "Constructor called<br>";
    // }
    //parameterized constructor
    function __construct($name,$speed){
        $this->name=$name;
        echo "Name : $name";
        $this->speed=$speed;
        echo " Your Speed is $speed";
       
    }
}

    class Employee{

        public $name = "kaushal";
        private $salary = 12000;
        private $grade = 3;

        function setSalary($salary){
            $this->salary = $salary; 
        }

        function getSalary(){ 
            echo "The salary of employee is $this->name is $this->salary <br>";
        }

        function showName(){
            echo "The name of this employee is $this->name <br>";
        }
    }

    // Inheriting a new class Programmer from Employee
    class Programmer extends Employee{
        private $language = "php";

        function changeLanguage($lang){
            $this->language = $lang; 
            // echo $this->grade; --> This will throw an error because grade is private in the parent class
        }

    

    function __destruct(){
        echo "<br>Your code is destroy";
    }
}

// $player1 = new Player();
$player2 = new Player("raj",3);

// $player1->set_name("kaushal");
// echo $player1->get_name();
$rohan = new Employee();
$rohan->name = "Rohan";
$rohan->setSalary(100);
$rohan->getSalary();
$rohan->showName();

$shubham = new Employee();
$shubham->name = "Shubham";
$shubham->setSalary(10000000);
$shubham->getSalary();
$shubham->showName();

$geeta = new Programmer();
$geeta->name = "Geeta";
echo $geeta->changeLanguage("Python");
$geeta->getSalary();
$geeta->showName();
?>

