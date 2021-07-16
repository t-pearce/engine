<?php

namespace Engine\Abstracts;

abstract class Enum
{
	const PREFIX = "";

	public static function getConstants() : array
	{
		$class = new \ReflectionClass(static::class);

		$consts = $class->getConstants();

		if(($key = array_search(static::PREFIX, $consts)) !== false) {
			unset($consts[$key]);
		}

		return $consts;
	}

	public static function isConstantValue($value, bool $hasPrefix = true) : bool
	{
		$constants = static::getConstants();

		return \in_array(($hasPrefix ? "" : static::PREFIX) . $value, $constants);
	}

	public static function getText($value) : string
	{
		if(!static::isConstantValue($value))
			throw new \LogicException("Given value {$value} is not a valid constant value");

		return $value;
	}

	public function addPrefix(string $value) : string
	{
		return static::PREFIX . $value;
	}

	public static function getHumanReadableText($value) : string
	{
		$value = static::getText($value);

		$text = preg_replace(array('/(?<=[^A-Z])([A-Z])/', '/(?<=[^0-9])([0-9])/'), ' $0', $value);
		$text = ucwords($text);

		return $text;
	}
}