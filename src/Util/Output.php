<?php

namespace Engine\Util;

class Output
{
	public static function print($element) : void
	{
		print_r("<pre>");
		print_r($element);
		print_r("</pre>");
	}

	public static function p($element) : void
	{
		self::print($element);
	}
}