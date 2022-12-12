<?php
include_once 'Shop.php';
include_once 'Istorage.php';


use Base\Category\{Shop};
use Base\User\{User};

trait Email
{
    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
}
class Car extends Shop implements Istorage
{
    public $type;
    public $city;
    use Email;
    function __construct($name, $email, $id, $type, $city)
    {
        parent::__construct($name, $email, $id);
        $this->type = $type;
        $this->city = $city;
    }
    function add(){
        $data = ['id'=>$this->id, 'name'=>$this->name, 'email'=>$this->email, 'type'=>$this->type, 'city'=>$this->city];
        $jsdata = json_encode($data);
        file_put_contents('car.txt', $jsdata, FILE_APPEND);
    }
    function get(){
        $jsdata = file_get_contents('car1.json',true);
        return json_decode($jsdata);
    }
    function update(){

    }
    function delete(){

    } 
    
}


$carshop1 = new Car('lider', 'lider@lider', 1, 'auto', 'moscow');
echo '<pre>';
var_dump($carshop1);
echo '</pre>';
// $carshop1->email = 'lada@lada';

// echo $carshop1->getName() . '<br>';
// echo $carshop1->getEmail() . '<br>';

$carshop1->setEmail('wv@wv');
// echo $carshop1->getEmail() . '<br>';
// $carshop1->add();
// $product1 = new Shop('user', 'user@user.ru', 1);
var_dump($carshop1->get());
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

// $admin = new User('koston', 'koston022@mail', 'admin');

// echo '<pre>';
// var_dump($admin);
// echo '</pre>';

// echo $admin->getInfo();
