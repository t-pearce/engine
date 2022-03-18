<?php

namespace Engine;

abstract class ConfigProvider
{
	use \Engine\Traits\Creatable;

	abstract public function get(string $key);
}