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
}