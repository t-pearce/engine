<?php

namespace Engine\Util;

class Strings
{
	public static function contains($needle, $haystack) : bool
	{
		return strpos($haystack, $needle) !== false;
	}

	public static function snakeCaseToHumanReadable($string) : string
	{
		return ucfirst(str_replace('_', ' ', $string));
	}

	public static function levenshteinDistance(string $a, string $b) : int
	{
		return \Engine\Util\Service\EditDistanceCalculator::create()
		->setSubjectString($a)
		->setTargetString($b)
		->run()
		->getDistance();
	}

	public static function getClosestStringsToTarget(string $target, int $count, string ...$strings) : array
	{
		usort($strings, function($a, $b) use ($target)
		{
			return self::levenshteinDistance($target, $a) <=> self::levenshteinDistance($target, $b);
		});

		return array_slice($strings, 0, $count);
	}
}