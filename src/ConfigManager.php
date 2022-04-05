<?php

namespace Engine;

class ConfigManager
{
	/** @var array<ConfigProvider> */
	private array $configProviders = [];

	use \Engine\Traits\Singleton;

	public function addConfigProvider(ConfigProvider $provider)
	{
		$this->configProviders[] = $provider;

		return $this;
	}

	public function get($key)
	{
		foreach($this->configProviders as $provider)
		{
			$value = $provider->get($key);

			if($value !== null)
				return $value;
		}

		throw new \LogicException("No value found for {$key}");
	}
}