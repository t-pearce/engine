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
}