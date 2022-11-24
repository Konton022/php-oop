<?php

interface IStorage
{
	public function add(string $key, mixed $data): self;
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
	public function add(string $key, mixed $data): self
	{
		$this->store[$key] = $data;
		return $this;
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
	public array $objects = [];

	public function addObject(JsonSerializable $obj): void
	{
		$this->objects[] = $obj;
	}

	public function log(string $betweenLogs = ','): string
	{
		$logs = array_map(function (JsonSerializable $obj) {
			return $obj->jsonSerialize();
		}, $this->objects);

		// return $logs;
		return implode($betweenLogs, $logs);
	}
}

$mainStore = (new Storage())->add('user', 'kos')->add('pass', '123456')->add('email', 'kos@ton');
$secondStore = (new Storage())->add('item', 'hdd');
$reservStore = (new Storage())->add('item', 'flash');

// echo '<pre>';
// var_dump($mainStore);
// echo '</pre>';


$logger = new JSONLogger();
$logger->addObject($mainStore);
$logger->addObject($secondStore);
$logger->addObject($reservStore);


echo '<pre>';
print_r (json_encode($logger->log()));
echo '</pre>';
