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

		foreach($a as $a_val)
		{
			if(!is_array($a_val))
				$a_val = [$a_val];

			foreach($b as $b_val)
			{
				if(!is_array($b_val))
					$b_val = [$b_val];

				$product[] = array_merge($a_val, $b_val);
			}
		}

		return $product;
	}
}