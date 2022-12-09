<?php

namespace Category;

class Shop
{
	public string $name;
	private string $email;
	public int $id;

	public function __construct($name, $email, $id)
	{
		$this->name = $name;
		$this->email = $email;
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}
}
