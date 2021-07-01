<?php

namespace Engine\Util;

class Arrays
{
	public static function cartesianProduct(array ...$arrays)
	{
		$result = [];

		foreach($arrays as $array)
		{
			$result = self::cartesianProductofTwoArrays($result, $array);
		}

		return $result;
	}

	private static function cartesianProductofTwoArrays(array $a, array $b)
	{
		if(\count($a) < 1)
			return $b;
		if(\count($b) < 1)
			return $a;

		$product = [];

		foreach($a as $aVal)
		{
			if(!is_array($aVal))
				$aVal = [$aVal];

			foreach($b as $bVal)
			{
				if(!is_array($bVal))
					$bVal = [$bVal];

				$product[] = array_merge($aVal, $bVal);
			}
		}

		return $product;
	}

	public static function isAssoc(array $arr)
	{
		if([] === $arr)
			return false;

		// If there are string keys, it's associative
		if(count(array_filter(array_keys($arr), 'is_string')) > 0)
			return true;

		$keys = array_keys($arr);

		sort($keys);

		// If the sorted keys are equal to the integer range from 0 to before the length of the array
		// it's considered numeric.
		return $keys != range(0, count($keys) - 1);
	}
}