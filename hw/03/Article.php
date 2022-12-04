<?php
include_once "InewStorage.php";

class Article implements InewStorage
{
	public $title;
	public $text;

	public function __construct(string $title, string $text)
	{
		$this->title = $title;
		$this->text = $text;
	}
	public function create(array $fields): int
	{
	}
	public function get(int $id): ?array
	{
	}
	public function remove(int $id): bool
	{
	}
	public function update(int $id, array $fields): bool
	{
	}
	protected function isValid()
	{
	}
}
