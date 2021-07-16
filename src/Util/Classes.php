<?php

namespace Engine\Util;

class Classes
{
	public static function hasTrait(string $class, string $traitToFind) : bool
	{
		$reflection = new \ReflectionClass($class);

		$parent     = $reflection->getParentClass();
		$interfaces = $reflection->getInterfaces();
		$traits     = $reflection->getTraits();

		foreach($traits as $trait)
		{
			if($trait->getName() === $traitToFind)
				return true;

			if(self::hasTrait($trait->getName(), $traitToFind))
				return true;
		}

		foreach($interfaces as $interface)
			if(self::hasTrait($interface->getName(), $traitToFind))
				return true;

		if($parent !== false && self::hasTrait($parent->getName(), $traitToFind))
			return true;

		return false;
	}
}