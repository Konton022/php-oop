<?php

class Tag {
    public $name;
    public $attrs = [];
    public $children = [];
    public $content = '';
    
    public function __construct(string $name){
        $this -> name = $name;
    }    
    public function attr($name, $value){
        $this->attrs[$name] = $value;
    }
    public function attrArray($arr =[]){
        $this->attrs = array_merge($this->attrs, $arr );
    }
    public function appendChild($element) {
        $this->children[] = $element;
    }
    public function addContent($text) {
        $this->content .= $text;
    }

    public function render(){
        $childStr = '';
        $attrStr = '';
        foreach($this->attrs as $key => $value) {
            $attrStr .="$key=\"$value\" ";

        }

        $elem = "<{$this->name} $attrStr> {$this->content} </{$this->name}>";
        return $elem;
    }

}

class PairTag extends Tag {


}

class SingleTag extends Tag {
    private $singleTags = ['area','base','basefont','bgsound','col','command','embed','hr','img','input','isindex','keygen','link','meta','param','source','track','wbr'];
}

// $a = new Tag("a");
// $a->attr('class', 'button');
// $a->attr('value', 'go to Yandex');
// $a->attr('href', 'http://yandex.ru');
// $a->attr('data-class', 'delete-btn');

$content = new Tag('html');
$header = new Tag("div");

$main = new Tag('div');
$footer = new Tag("div");


$header -> attrArray(['class'=> 'header', 'id'=>'header_one']);
$main -> attrArray(['class'=> 'container', 'id'=>'container_one']);
$footer -> attrArray(['class'=> 'footer', 'id'=>'footer_one']);

$header -> addContent('<h1>HEADER</h1>');
$main -> addContent('<button>body button</button>');
$footer -> addContent('<h1>FOOTER</h1>');

$content->appendChild($header);
$content->appendChild($main);
$content->appendChild($footer);

echo $header->render();
echo $main->render();
echo $footer->render();

