<?php

namespace Articles;

use Istorage;

class Article implements Istorage
{
	public int $id;
	public string $title;
	public string $content;
}
