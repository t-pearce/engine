<?php

namespace Engine\Traits;

trait Creatable
{
	public static function create() : self
	{
		return new static();
	}
}