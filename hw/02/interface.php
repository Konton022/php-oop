<?php

interface IStorage
{
	public function add(string $key, mixed $data): void;
	public function remove(string $key): void;
	public function contains(string $key): bool;
	public function get(string $key): mixed;
}

interface Iserializable
{
	public function jsonSerialize(): mixed;
}

class Storage implements IStorage, Iserializable
{
	public $store = [];
	public function add(string $key, mixed $data): void
	{
		$this->store[$key] = $data;
	}
	public function remove(string $key): void
	{
		unset($this->store[$key]);
	}
	public function contains(string $key): bool
	{
		return array_key_exists($key, $this->store);
	}
	public function get(string $key): mixed
	{
		return $this->store[$key] ?? -1;
	}
	public function jsonSerialize(): mixed
	{
		return $this->store;
	}
}

class JSONLogger
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

$mainStore = (new Storage())->add('item', 'ssd');
$secondStore = (new Storage())->add('item', 'hdd');
$reservStore = (new Storage())->add('item', 'flash');

$logger = new JSONLogger();
$logger->addObject($mainStore);
$logger->addObject($secondStore);
$logger->addObject($reservStore);


echo '<pre>';
echo json_encode($logger->log());
echo '</pre>';
