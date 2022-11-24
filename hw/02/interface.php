<?php

interface IStorage
{
	public function add(string $key, mixed $data): void;
	public function remove(string $key): void;
	public function contains(string $key): bool;
	public function get(string $key): mixed;
}

// interface Iserializable
// {
// 	public function jsonSerialize(): mixed;
// }

class Storage implements IStorage, JsonSerializable
{
	public array $store = [];
	public function add(string $key, mixed $data): void
	{
		$this->store[$key] = $data;
	}
	public function remove(string $key): void
	{
		if ($this->contains($key)) {
			unset($this->store[$key]);
		}
	}
	public function contains(string $key): bool
	{
		return array_key_exists($key, $this->store);
	}
	public function get(string $key): mixed
	{
		return $this->contains($key) ? $this->store[$key] : null;
	}
	public function jsonSerialize(): mixed
	{
		return $this->store;
	}
}

class JSONLogger
{
	public array $objects = [];

	public function addObject(JsonSerializable $obj): void
	{
		$this->objects[] = $obj;
	}

	public function log(string $betweenLogs = ','): string
	{
		$logs = array_map(function (JsonSerializable $obj) {
			return json_encode($obj->jsonSerialize(), JSON_PRETTY_PRINT | JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_SLASHES);
		}, $this->objects);
		return implode($betweenLogs, $logs);
	}
}

$mainStore = new Storage();
$mainStore->add('user', 'kos');
$secondStore = new Storage();
$secondStore->add('item', 'hdd');
$reservStore = new Storage();
$reservStore->add('item', 'flash');

// echo '<pre>';
// var_dump($mainStore);
// echo '</pre>';


$logger = new JSONLogger();
$logger->addObject($mainStore);
$logger->addObject($secondStore);
$logger->addObject($reservStore);


echo '<pre>';
echo json_encode($logger->log());
echo '</pre>';
