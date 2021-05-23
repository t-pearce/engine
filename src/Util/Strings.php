<?php

namespace Engine\Util;

class Strings
{
	public static function contains($needle, $haystack) : bool
	{
		return strpos($haystack, $needle) !== false;
	}
}