<?php

namespace Engine\Traits;

trait Singleton
{
	private static $singleton_self;

	/**
	 * @return static
	 */
	public static function getInstance()
	{
		if(!isset(self::$singleton_self) || self::$singleton_self === null)
		{
			self::$singleton_self = new static();
		}

		return self::$singleton_self;
	}
}