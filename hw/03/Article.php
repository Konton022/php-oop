<?php

class Article
{
	public int $id;
	public string $title;
	public string $content;
	protected InewStorage $storage;

	public function __construct(InewStorage $storage)
	{
		$this->storage = $storage;
		
	}
	public function create(array $fields): int
	{
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
