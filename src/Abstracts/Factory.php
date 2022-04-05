<?php

namespace Engine\Abstracts;

abstract class Factory
{
	/** @var mixed[] */
	protected array $objects = [];

	public function __construct()
	{
		foreach($this->defineObjects() as $object)
		{
			var_dump($object);
			$this->objects[$this->getIdentifier($object)] = $object;
		}
		die;
	}

	protected function get($key)
	{
		if(!$this->hasKey($key))
			return null;

		return $this->objects[$key];
	}

	/** @return mixed[] */
	protected function getAll() : array
	{
		return array_values($this->objects);
	}

	public function countAll() : int
	{
		return count($this->objects);
	}

	protected function hasKey($key) : bool
	{
		foreach($this->objects as $k => $object)
		{
			if($key === $k)
				return true;
		}

		return false;
	}

	protected function getIdentifier($object)
	{
		$reflection = new \ReflectionClass($object);

		return $reflection->getName();
	}

	abstract protected function defineObjects() : array;
	
	protected function postDefintion() : void {}
}