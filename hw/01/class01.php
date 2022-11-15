<?php

class Tag {
    public $name;
    public $attr = [];
    public $child = [];
    
    public function __construct(string $name){
        $this -> name = $name;
    }    
    public function attr($name, $value){
        $this->attr[$name] = $value;
    }
    public function attrArray($arr =[]){
        $this->attr = array_merge($this->attr, $arr );
    }
    public function appendChild($element) {
        $this->child[] = $element;
    }

    public function render($content=''){

        $attrStr = '';
        foreach($this->attr as $key => $value) {
            $attrStr .="$key=\"$value\" ";

        }
        $elem = "<$this->name $attrStr>$content</$this->name>";
        return $elem;
    }

}

class PairTag extends Tag {


}

class SingleTag extends Tag {
    private $singleTags = ['area','base','basefont','bgsound','col','command','embed','hr','img','input','isindex','keygen','link','meta','param','source','track','wbr'];
}

$a = new Tag("a");
$a->attr('class', 'button');
$a->attr('value', 'go to Yandex');
$a->attr('href', 'http://yandex.ru');
$a->attr('data-class', 'delete-btn');

$html = new Tag('html');
$header = new Tag("div");
$body = new Tag('div');
$footer = new Tag("div");


$header -> attrArray(['class'=> 'header', 'id'=>'header_one']);
$body -> attrArray(['class'=> 'container', 'id'=>'container_one']);
$footer -> attrArray(['class'=> 'footer', 'id'=>'footer_one']);

$html->appendChild($header);
$html->appendChild($body);
$html->appendChild($footer);

echo '<pre>';
var_dump($header);
echo '</pre>';
echo '<hr>';
echo '<pre>';
var_dump($body);
echo '</pre>';
echo '<hr>';

echo '<pre>';
var_dump($footer);
echo '</pre>';
echo '<hr>';


echo '<pre>';
var_dump($html);
echo '</pre>';

echo $a->render('hello  world');

// echo '<pre>';
// print_r($b);
// echo '</pre>';

// echo $b->render();
