<?php

include_once('ini.php');
include_once('db.php');
include_once('Article.php');

$article1 = new Article();
$article1->create(['title' => 'new article', 'text' => 'some text for article']);


echo '<pre>';
print_r($article1);
echo '</pre>';
