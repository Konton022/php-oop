<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

}

interface Renderable {
    public function render() : string;
}

abstract class Tag implements Renderable {
    public $name;
    public $attrs = [];

    public function __construct(string $name){
        $this -> name = $name;
    }    
    public function attr($name, $value){
        $this->attrs[$name] = $value;
        return $this;
    }
    public function attrArray($arr =[]){
        $this->attrs = array_merge($this->attrs, $arr );
    }

    
    public function generateAttrStr() {
        $attrStr = '';
        foreach($this->attrs as $key => $value) {
            $attrStr .="$key=\"$value\" ";
        }
        return $attrStr;
    }

}

class TextNode implements Renderable {
    public $text;
    public function __construct( string $text) {
        $this->text = $text;
    }
    public function render() : string {
        return $this->text;
    }
}

class PairTag extends Tag {
    public $children = [];
    public function appendChild(Renderable $element) {
        $this->children[] = $element;
        return $this;
    }
    public function render() : string {
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
    public function render() : string {
        $childStr = '';
        $attrStr = $this->generateAttrStr();
        $content = 'child';
        return "<{$this->name} $attrStr>";
    }
}

$helloText = new TextNode('hello world');

$inputName = new SingleTag('input');
$inputPass = new SingleTag('input');
$inputSubmit = new SingleTag('input');
$form = new PairTag('form');
$alink = new PairTag('a');
$alink->attr('href', 'https://ya.ru')->appendChild($helloText);

$inputName -> attr('name', 'user') -> attr('type', 'text') -> attr('placeholder', 'username');
$inputPass -> attrArray(['name'=>'password', 'type'=>'password', 'placeholder'=>'password']);
$inputSubmit -> attrArray(['type'=>'submit', 'value'=>'send']);
$form -> attr('method', 'POST');


$form->appendChild($inputName)->appendChild($inputPass)->appendChild($inputSubmit)->appendChild($alink);

// echo '<pre>';
// var_dump($form);
// echo '</pre>';

echo $form->render();








