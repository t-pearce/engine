<?php

namespace Engine\Core\Traits;

trait Singleton
{
	private static $singleton_self;

	/**
	 * @return static
	 */
	public static function getInstance()
	{
		if(!isset(self::$singleton_self))
			self::$singleton_self = new self();

		return self::$singleton_self;
	}
}