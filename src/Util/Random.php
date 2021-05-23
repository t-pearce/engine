<?php

namespace Engine\Util;

class Random
{
	public static function choice(array $array)
	{
		$keys = array_keys($array);

		$key = $keys[self::number(0, count($keys) - 1)];

		return $array[$key];
	}

	public static function multipleChoice(array $array, int $number, bool $isExclusive = true) : array
	{
		$choices = [];

		if(count($array) < $number && $isExclusive)
			throw new \DomainException("You can't select more things that are there if you're choosing exclusively.");

		while(count($choices) < $number)
		{
			$choice = self::choice($array);

			if($isExclusive && in_array($choice, $choices))
				continue;

			$choices[] = $choice;
		}

		return $choices;
	}

	public static function number(int $min = 0, int $max = null) : int
	{
		return mt_rand($min, $max ?? mt_getrandmax());
	}

	public static function numericString(int $length) : string
	{
		$return = self::number(1, 9);

		for($i = 0; $i < $length - 1; $i++)
		{
			$return .= (string)self::number(0, 9);
		}

		return $return;
	}
}