<?php

class User {
    public $name;
    public $secondName;
    private $age;
    private $height;
    private $bankAccount;
    
    public function __construct(string $name, string $secondName, int $age, int $height, string $bankAccount) {
        $this->name = $name;
        $this->secondName = $secondName;
        $this->age = $age;
        $this->height = $height;
        $this->bankAccount = $bankAccount;
    }
    public function getAge(){
        return $this->age;
    }
    public function setAge($newAge){
        $this->age = $newAge;
    }
    public function setName($name) {
        $this->name = $name;
    } 

}

$user1 = new User('kos', 'ton', 39, 175, '5520-4454-5544-7700');
$user1 -> setName('Kolya');

echo '<pre>';
print_r($user1);
echo '<pre>';

echo '<pre>';
print_r($user1->setAge(50));
echo '<pre>';

echo '<pre>';
print_r($user1->getAge());
echo '<pre>';