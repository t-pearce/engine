<?php

namespace Engine\Core\Traits;

trait Creatable
{
	public static function create() : self
	{
		return new static();
	}
}