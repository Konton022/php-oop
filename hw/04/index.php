<?php

class Shop {
    public string $name;
    private string $email;
    public int $id;
    
    public function __construct($name, $email, $id){
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }
    
    public function getName(){
        return $this->name;
    }
    // public function getEmail(){
    //     return $this->email;
    // }
}
trait Email {
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email = $email;
    }
}
class Car extends Shop {
    public $type;
    public $city;
    use Email;
    function __construct($name, $email, $id, $type, $city)
    {
        parent::__construct($name, $email, $id);
        $this->type = $type;
        $this->city = $city;
    }
}

$carshop1 = new Car('lider', 'lider@lider', 1, 'auto', 'moscow');
echo '<pre>';
var_dump($carshop1);
echo '</pre>';
$carshop1->email = 'lada@lada';

echo $carshop1->getName() . '<br>';
echo $carshop1->getEmail() . '<br>';

$carshop1->setEmail('wv@wv');
echo $carshop1->getEmail() . '<br>';
// $product1 = new Shop('user', 'user@user.ru', 1);


// var_dump($product1);

// class ShoppingCard{
//     private static string $name;
    
//     static function setName($value){
//         self::$name = $value;
//     }
//     static function getName(){
//         return self::$name;
//     }

// }

// ShoppingCard::setName('Koston');
// echo ShoppingCard::getName();



