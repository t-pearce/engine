<?php

namespace Engine\Core\Traits;

trait Singleton
{
	private static self $singleton_self;

	public static function getInstance() : self
	{
		if(!isset(self::$singleton_self))
			self::$singleton_self = new static();

		return self::$singleton_self;
	}
}