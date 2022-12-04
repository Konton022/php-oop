<?php

include_once 'InewStorage.php';
class Article implements InewStorage
{
	// public $title;
	// public $text;

	// public function __construct(string $title, string $text)
	// {
	// 	$this->title = $title;
	// 	$this->text = $text;
	// }
	public function create(array $fields): int
	{
		// $this->title = $fields['title'];
		// $this->text = $fields['text'];
		$sql = "INSERT INTO article (title, text) VALUES (:title, :text)";
		$query = dbQuery($sql, $fields);
		var_dump($query);
		return true;
	}
	public function get(int $id): ?array
	{
		return [];
	}
	public function remove(int $id): bool
	{
		return true;
	}
	public function update(int $id, array $fields): bool
	{
		return true;
	}
	protected function isValid()
	{
	}
}
