<?php

interface IStorage
{
	public function add(string $key, mixed $data): void;
	public function remove(string $key): void;
	public function contains(string $key): bool;
	public function get(string $key): mixed;
	public function jsonSerialize(): void;
}

class Storage implements IStorage
{
	public function add(string $key, mixed $data): void
	{
	}
	public function remove(string $key): void
	{
	}
	public function contains(string $key): bool
	{
		return true;
	}
	public function get(string $key): mixed
	{
	}
	public function jsonSerialize(): void
	{
	}
}

class JSONLogger extends Storage
{
	protected array $objects = [];

	public function addObject($obj): void
	{
		$this->objects[] = $obj;
	}

	public function log(string $betweenLogs = ','): string
	{
		$logs = array_map(function ($obj) {
			return $obj->jsonSerialize();
		}, $this->objects);

		return implode($betweenLogs, $logs);
	}
}
