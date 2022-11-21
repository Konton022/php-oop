<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

}

class Tag {
    public $name;
    public $attrs = [];

    public function __construct(string $name){
        $this -> name = $name;
    }    
    public function attr($name, $value){
        $this->attrs[$name] = $value;
    }
    public function attrArray($arr =[]){
        $this->attrs = array_merge($this->attrs, $arr );
    }

    public function render(){
        return '';
    }
    public function generateAttrStr() {
        $attrStr = '';
        foreach($this->attrs as $key => $value) {
            $attrStr .="$key=\"$value\" ";
        }
        return $attrStr;
    }

}

class PairTag extends Tag {
    public $children = [];
    public function appendChild(Tag $element) {
        $this->children[] = $element;
    }
    public function render(){
        $childStr = '';
        $attrStr = $this->generateAttrStr();
        $content = '';
        if (isset($this->children)) {
            foreach($this->children as $child){
                // var_dump($child);
                $content .= $child->render();
            }
        } 
        // var_dump('content: '.$content);   
        $elem = "<{$this->name} $attrStr> {$content} </{$this->name}>";
        return $elem;
    }
}

class SingleTag extends Tag {
    public function render(){
        $childStr = '';
        $attrStr = $this->generateAttrStr();
        $content = 'child';
        return "<{$this->name} $attrStr>";
    }
}

$inputName = new SingleTag('input');
$inputPass = new SingleTag('input');
$inputSubmit = new SingleTag('input');
$form = new PairTag('form');

$inputName -> attrArray(['name'=>'user', 'type'=>'text', 'placeholder'=>'username']);
$inputPass -> attrArray(['name'=>'password', 'type'=>'password', 'placeholder'=>'userpassword']);
$inputSubmit -> attrArray(['type'=>'submit', 'value'=>'send']);
$form -> attr('method', 'POST');


$form->appendChild($inputName);
$form->appendChild($inputPass);
$form->appendChild($inputSubmit);


// echo '<pre>';
// var_dump($form);
// echo '</pre>';

echo $form->render();








