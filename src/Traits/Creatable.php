<?php

namespace Engine\Traits;

trait Creatable
{
	public function __construct() {}

	/**
	 * @return static
	 */
	public static function create() : self
	{
		return new static();
	}
}