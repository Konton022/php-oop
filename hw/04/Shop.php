<?php

namespace Base\Category; {
	class Shop
	{
		protected string $name;
		protected string $email;
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
}

namespace Base\User; {
	class User
	{
		public $name;
		public $email;
		public $status;
		function __construct($name, $email, $status)
		{
			$this->name = $name;
			$this->email = $email;
			$this->status = $status;
		}
		function getInfo()
		{
			return "name: {$this->name} / email: {$this->email} / status: {$this->status}";
		}
	}
}
