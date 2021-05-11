<?php

namespace Engine\Core\Util;

class Output
{
	public static function print(mixed $element) : void
	{
		print_r("<pre>");
		print_r($element);
		print_r("</pre>");
	}

	public static function p(mixed $element) : void
	{
		self::print($element);
	}
}