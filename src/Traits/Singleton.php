<?php

namespace Engine\Traits;

trait Singleton
{
	/**
	 * @return static
	 */
	final public static function getInstance()
	{
		static $instance = null;

		if($instance === null)
		{
			$instance = new static();
		}

		return $instance;
	}
}