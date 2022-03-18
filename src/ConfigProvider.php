<?php

namespace Engine;

class ConfigProvider
{
	public function get($key)
	{
		switch($key)
		{
			case \Engine\Config::PAGE_DEFAULT_TEMPLATE:
				// return \PtuDex\Routing\Template::getInstance();
		}
	}
}